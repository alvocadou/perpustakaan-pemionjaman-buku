<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Anggota;
use App\Models\Peminjaman;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBuku = Buku::count();
        $totalAnggota = Anggota::count();
        $totalPeminjaman = Peminjaman::count();

        $sedangDipinjam = Peminjaman::where('status', 'dipinjam')->count();
        $sudahDikembalikan = Peminjaman::where('status', 'dikembalikan')->count();

        $peminjamanTerbaru = Peminjaman::with(['anggota', 'buku'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard.index', compact(
            'totalBuku',
            'totalAnggota',
            'totalPeminjaman',
            'sedangDipinjam',
            'sudahDikembalikan',
            'peminjamanTerbaru'
        ));
    }
}