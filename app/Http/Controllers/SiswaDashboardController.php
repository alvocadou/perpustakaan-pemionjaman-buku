<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;

class SiswaDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $anggota = $user->anggota;

        $totalBuku = Buku::count();

        $stokTersedia = Buku::sum('stok');

        $daftarBuku = Buku::orderBy('judul')->get();

        $peminjaman = $anggota
            ? Peminjaman::with('buku')
                ->where('anggota_id', $anggota->id)
                ->latest()
                ->get()
            : collect();

        $sedangDipinjam = $peminjaman
            ->where('status', 'dipinjam')
            ->count();

        $sudahDikembalikan = $peminjaman
            ->where('status', 'dikembalikan')
            ->count();

        $terlambat = $peminjaman
            ->where('status', 'dipinjam')
            ->filter(function ($item) {
                return $item->tanggal_kembali < now()->toDateString();
            })
            ->count();

        return view('siswa.dashboard', compact(
            'user',
            'anggota',
            'totalBuku',
            'stokTersedia',
            'daftarBuku',
            'peminjaman',
            'sedangDipinjam',
            'sudahDikembalikan',
            'terlambat'
        ));
    }

    public function detail($id)
    {
        $user = Auth::user();
        $anggota = $user->anggota;

        abort_unless($anggota, 403, 'Akun belum terhubung dengan anggota.');

        $peminjaman = Peminjaman::with(['buku', 'anggota'])
            ->where('anggota_id', $anggota->id)
            ->findOrFail($id);

        return view('siswa.detail-peminjaman', compact(
            'user',
            'anggota',
            'peminjaman'
        ));
    }}