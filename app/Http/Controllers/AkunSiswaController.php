<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;

class AkunSiswaController extends Controller
{
    public function index()
    {
        $akunSiswa = User::with('anggota')
            ->where('role', 'siswa')
            ->latest()
            ->get();

        return view('akun-siswa.index', compact('akunSiswa'));
    }

    public function create()
    {
        $anggota = Anggota::whereDoesntHave('user')
            ->orderBy('nama')
            ->get();

        return view('akun-siswa.create', compact('anggota'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'anggota_id' => 'required|exists:anggota,id|unique:users,anggota_id',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'confirmed',
                Password::min(8),
            ],
        ], [
            'anggota_id.required' => 'Silakan pilih anggota.',
            'anggota_id.unique' => 'Anggota ini sudah memiliki akun.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password wajib diisi.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $anggota = Anggota::findOrFail($validated['anggota_id']);

        DB::transaction(function () use ($validated, $anggota) {
            User::create([
                'name' => $anggota->nama,
                'email' => $validated['email'],
                'password' => $validated['password'],
                'role' => 'siswa',
                'anggota_id' => $anggota->id,
            ]);
        });

        return redirect()->route('akun-siswa.index')
            ->with('success', 'Akun Siswa berhasil dibuat.');
    }
}