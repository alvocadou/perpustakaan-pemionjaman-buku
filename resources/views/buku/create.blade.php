
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 30px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 7px 0 15px;
            box-sizing: border-box;
        }

        button {
            background: #2563eb;
            color: white;
            border: none;
            padding: 12px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        a { text-decoration: none; color: #2563eb; }

        .error { color: red; margin-bottom: 10px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Tambah Buku</h2>

    @if($errors->any())
        <div class="error">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('buku.store') }}" method="POST">
        @csrf

        <label>Kode Buku</label>
        <input type="text" name="kode_buku" value="{{ old('kode_buku') }}" required>

        <label>Judul Buku</label>
        <input type="text" name="judul" value="{{ old('judul') }}" required>

        <label>Pengarang</label>
        <input type="text" name="pengarang" value="{{ old('pengarang') }}" required>

        <label>Penerbit</label>
        <input type="text" name="penerbit" value="{{ old('penerbit') }}">

        <label>Tahun Terbit</label>
        <input type="number" name="tahun_terbit" value="{{ old('tahun_terbit') }}">

        <label>Stok Buku</label>
        <input type="number" name="stok" min="0" value="{{ old('stok', 0) }}" required>

        <button type="submit">Simpan Buku</button>
    </form>

    <p><a href="{{ route('buku.index') }}">← Kembali ke daftar buku</a></p>
</div>

</body>
</html>
