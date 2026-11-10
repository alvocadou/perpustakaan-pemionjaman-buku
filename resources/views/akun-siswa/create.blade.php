<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Akun Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">

                    <h3 class="fw-bold mb-1">Tambah Akun Siswa</h3>
                    <p class="text-secondary mb-4">
                        Buat akun login berdasarkan data anggota perpustakaan.
                    </p>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('akun-siswa.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Pilih Anggota</label>

                            <select name="anggota_id" class="form-select" required>
                                <option value="">-- Pilih Anggota --</option>

                                @foreach ($anggota as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('anggota_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->nis }} - {{ $item->nama }}
                                        ({{ $item->kelas }})
                                    </option>
                                @endforeach
                            </select>

                            @if ($anggota->isEmpty())
                                <small class="text-danger">
                                    Semua anggota sudah memiliki akun atau belum ada data anggota.
                                </small>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email Login</label>
                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                value="{{ old('email') }}"
                                placeholder="contoh@email.com"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Password</label>
                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="Minimal 8 karakter"
                                required
                            >
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Konfirmasi Password</label>
                            <input
                                type="password"
                                name="password_confirmation"
                                class="form-control"
                                placeholder="Ulangi password"
                                required
                            >
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('akun-siswa.index') }}"
                               class="btn btn-outline-secondary">
                                Kembali
                            </a>

                            <button type="submit" class="btn btn-primary"
                                {{ $anggota->isEmpty() ? 'disabled' : '' }}>
                                Simpan Akun
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

</body>
</html>
