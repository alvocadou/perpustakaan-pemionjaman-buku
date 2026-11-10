
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Akun Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Akun Siswa</h3>
            <p class="text-secondary mb-0">Kelola akun login siswa perpustakaan.</p>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                Kembali
            </a>

            <a href="{{ route('akun-siswa.create') }}" class="btn btn-primary">
                + Tambah Akun
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover align-middle">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>NIS</th>
                            <th>Kelas</th>
                            <th>Email Login</th>
                            <th>Role</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($akunSiswa as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td class="fw-semibold">
                                    {{ $item->anggota->nama ?? $item->name }}
                                </td>

                                <td>
                                    {{ $item->anggota->nis ?? '-' }}
                                </td>

                                <td>
                                    {{ $item->anggota->kelas ?? '-' }}
                                </td>

                                <td>{{ $item->email }}</td>

                                <td>
                                    <span class="badge bg-success">
                                        Siswa
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-secondary py-4">
                                    Belum ada akun Siswa.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>

</body>
</html>
