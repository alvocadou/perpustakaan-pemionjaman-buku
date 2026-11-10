<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with(['anggota', 'buku'])
            ->latest()
            ->get();

        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $anggota = Anggota::all();
        $buku = Buku::where('stok', '>', 0)->get();

        return view('peminjaman.create', compact('anggota', 'buku'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'anggota_id' => 'required|exists:anggota,id',
            'buku_id' => 'required|exists:buku,id',
            'jumlah' => 'required|integer|min:1|max:5',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
        ]);

        DB::transaction(function () use ($validated) {
            $buku = Buku::whereKey($validated['buku_id'])
                ->lockForUpdate()
                ->firstOrFail();

            if ($buku->stok < $validated['jumlah']) {
                throw ValidationException::withMessages([
                    'jumlah' => 'Stok buku tidak mencukupi.',
                ]);
            }

            $peminjamanAktif = Peminjaman::where(
                'anggota_id',
                $validated['anggota_id']
            )
                ->where('buku_id', $validated['buku_id'])
                ->where('status', 'dipinjam')
                ->exists();

            if ($peminjamanAktif) {
                throw ValidationException::withMessages([
                    'buku_id' => 'Siswa masih memiliki pinjaman aktif untuk buku ini.',
                ]);
            }

            Peminjaman::create([
                'kode_peminjaman' => 'PJM-' . now()->format('YmdHis') . '-' . Str::upper(Str::random(4)),
                'anggota_id' => $validated['anggota_id'],
                'buku_id' => $validated['buku_id'],
                'jumlah' => $validated['jumlah'],
                'tanggal_pinjam' => $validated['tanggal_pinjam'],
                'tanggal_kembali' => $validated['tanggal_kembali'],
                'tanggal_pengembalian' => null,
                'status' => 'dipinjam',
            ]);

            $buku->decrement('stok', $validated['jumlah']);
        });

        return redirect()->route('peminjaman.index')
            ->with('success', 'Peminjaman berhasil ditambahkan.');
    }

    public function kembalikan($id)
    {
        DB::transaction(function () use ($id) {
            $peminjaman = Peminjaman::whereKey($id)
                ->lockForUpdate()
                ->firstOrFail();

            if ($peminjaman->status === 'dikembalikan') {
                throw ValidationException::withMessages([
                    'pengembalian' => 'Buku ini sudah dikembalikan.',
                ]);
            }

            $buku = Buku::whereKey($peminjaman->buku_id)
                ->lockForUpdate()
                ->firstOrFail();

            $buku->increment('stok', $peminjaman->jumlah);

            $peminjaman->update([
                'status' => 'dikembalikan',
                'tanggal_pengembalian' => now()->toDateString(),
            ]);
        });

        return redirect()->route('peminjaman.index')
            ->with('success', 'Buku berhasil dikembalikan.');
    }
}