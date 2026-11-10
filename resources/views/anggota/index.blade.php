<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota - Perpustakaan Digital</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        h2 {
            color: #243b53;
        }

        .tambah {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #243b53;
            color: white;
        }

        .aksi a, .aksi button {
            display: inline-block;
            padding: 6px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .edit {
            background: #facc15;
            color: black;
        }

        .hapus {
            background: #dc2626;
            color: white;
        }

        .success {
            background: #dcfce7;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">

    <h2>Data Anggota Perpustakaan</h2>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('anggota.create') }}" class="tambah">
        + Tambah Anggota
    </a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($anggota as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nis }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->kelas }}</td>
                    <td>{{ $item->jurusan }}</td>

                    <td class="aksi">
                        <a href="{{ route('anggota.edit', $item->id) }}" class="edit">
                            Edit
                        </a>

                        <form action="{{ route('anggota.destroy', $item->id) }}"
                              method="POST"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="hapus"
                                onclick="return confirm('Yakin ingin menghapus anggota ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align:center;">
                        Belum ada data anggota.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

</body>
</html>