
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman</title>

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
            max-width: 1300px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            overflow-x: auto;
        }

        h2 {
            margin-top: 0;
        }

        .btn {
            display: inline-block;
            padding: 9px 13px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            color: white;
            font-size: 13px;
        }

        .btn-primary {
            background: #2563eb;
            margin-bottom: 20px;
        }

        .btn-success {
            background: #16a34a;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1100px;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #f1f5f9;
        }

        .status {
            display: inline-block;
            padding: 6px 9px;
            border-radius: 5px;
            font-size: 12px;
        }

        .dipinjam {
            background: #fef3c7;
            color: #92400e;
        }

        .dikembalikan {
            background: #dcfce7;
            color: #166534;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Data Peminjaman Buku</h2>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="error">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">
        + Tambah Peminjaman
    </a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Peminjaman</th>
                <th>Anggota</th>
                <th>Judul Buku</th>
                <th>Jumlah</th>
                <th>Tanggal Pinjam</th>
                <th>Batas Kembali</th>
                <th>Tanggal Dikembalikan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($peminjaman as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $item->kode_peminjaman }}</td>

                    <td>{{ $item->anggota->nama ?? '-' }}</td>

                    <td>{{ $item->buku->judul ?? '-' }}</td>

                    <td>{{ $item->jumlah }}</td>

                    <td>{{ $item->tanggal_pinjam }}</td>

                    <td>{{ $item->tanggal_kembali }}</td>

                    <td>
                        {{ $item->tanggal_pengembalian ?? '-' }}
                    </td>

                    <td>
                        @if($item->status === 'dikembalikan')
                            <span class="status dikembalikan">
                                Dikembalikan
                            </span>
                        @else
                            <span class="status dipinjam">
                                Dipinjam
                            </span>
                        @endif
                    </td>

                    <td>
                        @if($item->status === 'dipinjam')
                            <form
                                action="{{ route('peminjaman.kembalikan', $item->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin buku ini sudah dikembalikan?')"
                            >
                                @csrf
                                @method('PATCH')

                                <button type="submit" class="btn btn-success">
                                    Kembalikan
                                </button>
                            </form>
                        @else
                            Selesai
                        @endif
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="10" style="text-align:center;">
                        Belum ada data peminjaman.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

</body>
</html>
