<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'status' => 'nullable|in:semua,dipinjam,dikembalikan',
        ]);

        $query = Peminjaman::with(['anggota', 'buku'])
            ->latest();

        if ($request->filled('tanggal_mulai')) {
            $query->whereDate(
                'tanggal_pinjam',
                '>=',
                $request->tanggal_mulai
            );
        }

        if ($request->filled('tanggal_selesai')) {
            $query->whereDate(
                'tanggal_pinjam',
                '<=',
                $request->tanggal_selesai
            );
        }

        if ($request->filled('status') && $request->status !== 'semua') {
            $query->where('status', $request->status);
        }

        $laporan = $query->get();

        $totalTransaksi = $laporan->count();

        $totalDipinjam = $laporan
            ->where('status', 'dipinjam')
            ->count();

        $totalDikembalikan = $laporan
            ->where('status', 'dikembalikan')
            ->count();

        return view('laporan.index', compact(
            'laporan',
            'totalTransaksi',
            'totalDipinjam',
            'totalDikembalikan'
        ));
    }

    public function export(Request $request)
    {
        $request->validate([
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'status' => 'nullable|in:semua,dipinjam,dikembalikan',
        ]);

        $query = Peminjaman::with(['anggota', 'buku'])->latest();

        if ($request->filled('tanggal_mulai')) {
            $query->whereDate('tanggal_pinjam', '>=', $request->tanggal_mulai);
        }

        if ($request->filled('tanggal_selesai')) {
            $query->whereDate('tanggal_pinjam', '<=', $request->tanggal_selesai);
        }

        if ($request->filled('status') && $request->status !== 'semua') {
            $query->where('status', $request->status);
        }

        $laporan = $query->get();

        return response()->streamDownload(function () use ($laporan) {
            $file = fopen('php://output', 'w');

            // BOM agar karakter UTF-8 terbaca dengan benar di Excel.
            fwrite($file, "\xEF\xBB\xBF");

            fputcsv($file, [
                'Kode Peminjaman',
                'Nama Siswa',
                'NIS',
                'Judul Buku',
                'Jumlah',
                'Tanggal Pinjam',
                'Batas Kembali',
                'Tanggal Pengembalian',
                'Status',
            ]);

            foreach ($laporan as $item) {
                fputcsv($file, [
                    $item->kode_peminjaman ?? '-',
                    $item->anggota->nama ?? '-',
                    $item->anggota->nis ?? '-',
                    $item->buku->judul ?? '-',
                    $item->jumlah,
                    $item->tanggal_pinjam,
                    $item->tanggal_kembali,
                    $item->tanggal_pengembalian ?? '-',
                    $item->status,
                ]);
            }

            fclose($file);
        }, 'laporan-peminjaman-' . now()->format('Ymd-His') . '.csv', [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }}