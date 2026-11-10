<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku | Perpustakaan Digital</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #3157d5;
            --dark: #172554;
            --background: #f5f7fb;
            --muted: #64748b;
            --border: #e8edf5;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: var(--background);
            color: #1e293b;
            font-family: Inter, "Segoe UI", Arial, sans-serif;
        }

        .sidebar {
            background: var(--dark);
            min-height: 100vh;
            padding: 28px 18px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            color: white;
            font-size: 19px;
            font-weight: 700;
            padding: 0 10px;
            margin-bottom: 42px;
        }

        .brand-icon {
            width: 40px;
            height: 40px;
            display: grid;
            place-items: center;
            background: var(--primary);
            border-radius: 12px;
            font-size: 20px;
        }

        .nav-label {
            color: #94a3b8;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.5px;
            padding: 0 12px;
            margin: 25px 0 12px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 13px;
            color: #cbd5e1;
            text-decoration: none;
            padding: 12px 14px;
            border-radius: 10px;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: var(--primary);
            color: white;
        }

        .sidebar a i {
            font-size: 17px;
            width: 20px;
        }

        .main-content {
            padding: 32px;
            max-width: 1600px;
            margin: auto;
        }

        .page-title {
            font-size: 25px;
            font-weight: 750;
            margin-bottom: 5px;
        }

        .page-subtitle {
            color: var(--muted);
            font-size: 13px;
        }

        .content-card,
        .stat-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 22px;
        }

        .stat-card {
            height: 100%;
        }

        .stat-icon {
            width: 43px;
            height: 43px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            font-size: 19px;
        }

        .stat-value {
            font-size: 29px;
            font-weight: 750;
            margin: 15px 0 3px;
        }

        .stat-label {
            font-size: 13px;
            color: var(--muted);
        }

        .section-title {
            font-size: 16px;
            font-weight: 700;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            color: #64748b;
            background: #f8fafc;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .5px;
            padding: 14px;
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
        }

        .table tbody td {
            padding: 15px 14px;
            font-size: 13px;
            border-color: #f0f2f6;
            white-space: nowrap;
        }

        .table tbody tr:last-child td {
            border-bottom: none;
        }

        .badge-stock {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 7px;
            font-size: 11px;
            font-weight: 650;
        }

        .stock-available {
            background: #dcfce7;
            color: #15803d;
        }

        .stock-empty {
            background: #fee2e2;
            color: #b91c1c;
        }

        .search-box {
            position: relative;
        }

        .search-box i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
        }

        .search-box input {
            padding: 11px 14px 11px 40px;
            border-radius: 10px;
            border: 1px solid var(--border);
            font-size: 13px;
        }

        .search-box input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(49,87,213,.1);
        }

        .btn-primary {
            background: var(--primary);
            border-color: var(--primary);
        }

        .btn-primary:hover {
            background: #2446b8;
            border-color: #2446b8;
        }

        footer {
            color: #94a3b8;
            font-size: 12px;
            padding: 25px 0 5px;
            text-align: center;
        }

        @media (max-width: 767px) {
            .sidebar {
                min-height: auto;
                padding: 20px 15px;
            }

            .brand {
                margin-bottom: 20px;
            }

            .sidebar nav {
                display: grid;
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 4px;
            }

            .sidebar a {
                margin: 0;
                font-size: 12px;
                padding: 10px;
            }

            .nav-label {
                margin-top: 15px;
            }

            .main-content {
                padding: 22px 15px;
            }

            .content-card {
                padding: 16px;
            }
        }
    </style>
</head>

<body>

<div class="container-fluid">
    <div class="row">

        <!-- SIDEBAR -->
        <aside class="col-lg-2 sidebar">

            <div class="brand">
                <div class="brand-icon">
                    <i class="bi bi-book-half"></i>
                </div>
                <span>Perpustakaan</span>
            </div>

            <div class="nav-label">MENU UTAMA</div>

            <nav>
                <a href="{{ route('dashboard') }}">
                    <i class="bi bi-grid-1x2-fill"></i>
                    Dashboard
                </a>

                <a href="{{ route('buku.index') }}" class="active">
                    <i class="bi bi-book"></i>
                    Data Buku
                </a>

                <a href="{{ route('anggota.index') }}">
                    <i class="bi bi-people"></i>
                    Data Anggota
                </a>

                <a href="{{ route('peminjaman.index') }}">
                    <i class="bi bi-journal-arrow-up"></i>
                    Peminjaman
                </a>

                <a href="{{ route('akun-siswa.index') }}">
                    <i class="bi bi-person-badge"></i>
                    Akun Siswa
                </a>

                <a href="{{ route('laporan.index') }}">
                    <i class="bi bi-file-earmark-bar-graph"></i>
                    Laporan
                </a>
            </nav>

            <div class="nav-label">AKUN</div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn w-100 text-start text-white-50 border-0"
                    style="padding:12px 14px;font-size:14px;">
                    <i class="bi bi-box-arrow-left me-2"></i>
                    Keluar
                </button>
            </form>

        </aside>

        <!-- MAIN CONTENT -->
        <main class="col-lg-10 main-content">

            <header class="mb-4">
                <h1 class="page-title">Data Buku</h1>
                <p class="page-subtitle mb-2">
                    Kelola koleksi buku perpustakaan.
                </p>
                <div class="small text-secondary">
                    <i class="bi bi-calendar3 me-1"></i>
                    {{ now()->translatedFormat('l, d F Y') }}
                </div>
            </header>

            @if(session('success'))
                <div class="alert alert-success border-0 rounded-3 mb-4">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger border-0 rounded-3 mb-4">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <!-- STATISTIK -->
            <div class="row g-3 mb-4">

                <div class="col-sm-6 col-xl-4">
                    <div class="stat-card">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="stat-label fw-semibold">Total Judul Buku</span>
                            <div class="stat-icon bg-primary-subtle text-primary">
                                <i class="bi bi-book"></i>
                            </div>
                        </div>
                        <div class="stat-value">{{ $buku->count() }}</div>
                        <div class="stat-label">Judul buku terdaftar</div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-4">
                    <div class="stat-card">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="stat-label fw-semibold">Total Stok</span>
                            <div class="stat-icon bg-success-subtle text-success">
                                <i class="bi bi-journals"></i>
                            </div>
                        </div>
                        <div class="stat-value">{{ $buku->sum('stok') }}</div>
                        <div class="stat-label">Seluruh eksemplar buku</div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-4">
                    <div class="stat-card">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="stat-label fw-semibold">Stok Habis</span>
                            <div class="stat-icon bg-danger-subtle text-danger">
                                <i class="bi bi-exclamation-circle"></i>
                            </div>
                        </div>
                        <div class="stat-value">{{ $buku->where('stok', 0)->count() }}</div>
                        <div class="stat-label">Judul tanpa stok tersedia</div>
                    </div>
                </div>

            </div>

            <!-- TABEL BUKU -->
            <div class="content-card">

                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
                    <div>
                        <h5 class="section-title mb-1">Daftar Koleksi Buku</h5>
                        <div class="stat-label">Informasi seluruh koleksi perpustakaan.</div>
                    </div>

                    <a href="{{ route('buku.create') }}" class="btn btn-primary btn-sm px-3 py-2">
                        <i class="bi bi-plus-lg me-1"></i>
                        Tambah Buku
                    </a>
                </div>

                <div class="search-box mb-3">
                    <i class="bi bi-search"></i>
                    <input type="text" id="cariBuku" class="form-control"
                        placeholder="Cari kode, judul, pengarang, atau penerbit...">
                </div>

                <div class="table-responsive">
                    <table class="table align-middle" id="tabelBuku">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Buku</th>
                                <th>Judul Buku</th>
                                <th>Pengarang</th>
                                <th>Penerbit</th>
                                <th>Tahun</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($buku as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td class="text-secondary">
                                        {{ $item->kode_buku ?? '-' }}
                                    </td>

                                    <td class="fw-semibold">
                                        {{ $item->judul }}
                                    </td>

                                    <td>{{ $item->pengarang }}</td>

                                    <td>{{ $item->penerbit }}</td>

                                    <td>{{ $item->tahun_terbit }}</td>

                                    <td>
                                        @if($item->stok > 0)
                                            <span class="badge-stock stock-available">
                                                {{ $item->stok }} tersedia
                                            </span>
                                        @else
                                            <span class="badge-stock stock-empty">
                                                Habis
                                            </span>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('buku.edit', $item->id) }}"
                                               class="btn btn-sm btn-outline-primary"
                                               title="Edit buku">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            <form action="{{ route('buku.destroy', $item->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="btn btn-sm btn-outline-danger"
                                                    title="Hapus buku">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-secondary py-5">
                                        <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                        Belum ada data buku.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

                <div id="hasilPencarian" class="small text-secondary mt-3"></div>
            </div>

            <footer>
                &copy; {{ date('Y') }} Sistem Informasi Perpustakaan Digital.
                All rights reserved.
            </footer>

        </main>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('cariBuku');
    const tabel = document.getElementById('tabelBuku');
    const hasil = document.getElementById('hasilPencarian');

    if (!input || !tabel) return;

    const baris = tabel.querySelectorAll('tbody tr');

    input.addEventListener('input', function () {
        const kata = this.value.toLowerCase().trim();
        let jumlah = 0;

        baris.forEach(function (row) {
            const cocok = row.textContent.toLowerCase().includes(kata);
            row.style.display = cocok ? '' : 'none';

            if (cocok) jumlah++;
        });

        if (hasil) {
            hasil.textContent = kata ? jumlah + ' baris ditemukan.' : '';
        }
    });
});
</script>

</body>
</html>