<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Peminjaman</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 650px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        h2 {
            margin-top: 0;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 11px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button, .back {
            display: inline-block;
            padding: 11px 16px;
            border: none;
            border-radius: 5px;
            margin-top: 20px;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        button {
            background: #2563eb;
            color: white;
        }

        .back {
            background: #64748b;
            color: white;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-top: 5px;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Tambah Peminjaman Buku</h2>

    <form action="{{ route('peminjaman.store') }}" method="POST">
        @csrf

        <label>Anggota</label>
        <select name="anggota_id" required>
            <option value="">-- Pilih Anggota --</option>

            @foreach($anggota as $item)
                <option value="{{ $item->id }}"
                    {{ old('anggota_id') == $item->id ? 'selected' : '' }}>
                    {{ $item->nis }} - {{ $item->nama }}
                </option>
            @endforeach
        </select>

        @error('anggota_id')
            <div class="error">{{ $message }}</div>
        @enderror

        <label>Buku</label>
        <select name="buku_id" required>
            <option value="">-- Pilih Buku --</option>

            @foreach($buku as $item)
                <option value="{{ $item->id }}"
                    {{ old('buku_id') == $item->id ? 'selected' : '' }}>
                    {{ $item->judul }} (Stok: {{ $item->stok }})
                </option>
            @endforeach
        </select>

        @error('buku_id')
            <div class="error">{{ $message }}</div>
        @enderror

        <label>Jumlah Buku</label>
        <input
            type="number"
            name="jumlah"
            min="1"
            value="{{ old('jumlah', 1) }}"
            required
        >

        @error('jumlah')
            <div class="error">{{ $message }}</div>
        @enderror

        <label>Tanggal Peminjaman</label>
        <input
            type="date"
            name="tanggal_pinjam"
            value="{{ old('tanggal_pinjam', date('Y-m-d')) }}"
            required
        >

        @error('tanggal_pinjam')
            <div class="error">{{ $message }}</div>
        @enderror

        <label>Tanggal Batas Pengembalian</label>
        <input
            type="date"
            name="tanggal_kembali"
            value="{{ old('tanggal_kembali') }}"
            required
        >

        @error('tanggal_kembali')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit">Simpan Peminjaman</button>

        <a href="{{ route('peminjaman.index') }}" class="back">
            Kembali
        </a>
    </form>

</div>

</body>
</html>