<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Anggota - Perpustakaan Digital</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        h2 {
            color: #243b53;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 6px;
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button, .kembali {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        button {
            background: #2563eb;
            color: white;
        }

        .kembali {
            background: #64748b;
            color: white;
        }

        .error {
            color: red;
            font-size: 13px;
            margin-top: 5px;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>Tambah Anggota</h2>

    <form action="{{ route('anggota.store') }}" method="POST">
        @csrf

        <label>NIS</label>
        <input type="text" name="nis" value="{{ old('nis') }}" required>
        @error('nis')
            <div class="error">{{ $message }}</div>
        @enderror

        <label>Nama Lengkap</label>
        <input type="text" name="nama" value="{{ old('nama') }}" required>

        <label>Kelas</label>
        <input type="text" name="kelas" value="{{ old('kelas') }}" placeholder="Contoh: XI RPL 2" required>

        <label>Jurusan</label>
        <input type="text" name="jurusan" value="{{ old('jurusan') }}" placeholder="Contoh: Rekayasa Perangkat Lunak" required>

        <button type="submit">Simpan Anggota</button>

        <a href="{{ route('anggota.index') }}" class="kembali">
            Kembali
        </a>

    </form>

</div>

</body>
</html>