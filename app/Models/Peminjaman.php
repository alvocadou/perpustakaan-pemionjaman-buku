<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';

    protected $fillable = [
        'kode_peminjaman',
        'anggota_id',
        'buku_id',
        'jumlah',
        'tanggal_pinjam',
        'tanggal_kembali',
        'tanggal_pengembalian',
        'status',
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}