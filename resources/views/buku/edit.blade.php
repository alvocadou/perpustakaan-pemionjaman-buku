<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Buku</title>
</head>
<body>

    <h1>Edit Buku</h1>

    <form action="{{ route('buku.update', $buku->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Kode Buku</label><br>
        <input type="text" name="kode_buku" value="{{ old('kode_buku', $buku->kode_buku) }}" required>
        <br><br>

        <label>Judul Buku</label><br>
        <input type="text" name="judul" value="{{ old('judul', $buku->judul) }}" required>
        <br><br>

        <label>Pengarang</label><br>
        <input type="text" name="pengarang" value="{{ old('pengarang', $buku->pengarang) }}" required>
        <br><br>

        <label>Penerbit</label><br>
        <input type="text" name="penerbit" value="{{ old('penerbit', $buku->penerbit) }}">
        <br><br>

        <label>Tahun Terbit</label><br>
        <input type="number" name="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}">
        <br><br>

        <label>Stok</label><br>
        <input type="number" name="stok" value="{{ old('stok', $buku->stok) }}" min="0" required>
        <br><br>

        <button type="submit">Simpan Perubahan</button>
        <a href="{{ route('buku.index') }}">Kembali</a>
    </form>

</body>
</html>