<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::latest()->get();

        return view('anggota.index', compact('anggota'));
    }

    public function create()
    {
        return view('anggota.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:anggota,nis',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
        ]);

        Anggota::create($request->all());

        return redirect()->route('anggota.index')
            ->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function edit(Anggota $anggota)
    {
        return view('anggota.edit', compact('anggota'));
    }

    public function update(Request $request, Anggota $anggota)
    {
        $request->validate([
            'nis' => 'required|unique:anggota,nis,' . $anggota->id,
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
        ]);

        $anggota->update($request->all());

        return redirect()->route('anggota.index')
            ->with('success', 'Data anggota berhasil diperbarui.');
    }

    public function destroy(Anggota $anggota)
    {
        $anggota->delete();

        return redirect()->route('anggota.index')
            ->with('success', 'Anggota berhasil dihapus.');
    }
}