<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa | Perpustakaan Digital</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #3157d5;
            --primary-dark: #172554;
            --background: #f5f7fb;
            --text: #1e293b;
            --muted: #64748b;
            --border: #e8edf5;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--background);
            color: var(--text);
            font-family: Inter, "Segoe UI", Arial, sans-serif;
        }

        .sidebar {
            background: var(--primary-dark);
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
            transition: .2s;
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

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .page-title {
            font-size: 25px;
            font-weight: 750;
            margin-bottom: 5px;
            letter-spacing: -.5px;
        }

        .page-subtitle {
            color: var(--muted);
            font-size: 13px;
            margin: 0;
        }

        .date-label {
            color: var(--muted);
            font-size: 13px;
        }

        .student-profile {
            display: flex;
            align-items: center;
            gap: 11px;
            background: white;
            border: 1px solid var(--border);
            padding: 8px 14px;
            border-radius: 12px;
        }

        .avatar {
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            background: #e8edff;
            color: var(--primary);
            border-radius: 11px;
            font-weight: 700;
        }

        .stat-card,
        .content-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 22px;
            height: 100%;
        }

        .stat-card {
            transition: .2s;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(15, 23, 42, .06);
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .stat-title {
            color: var(--muted);
            font-size: 13px;
            font-weight: 600;
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
            font-size: 30px;
            font-weight: 750;
            margin: 17px 0 4px;
            letter-spacing: -.7px;
        }

        .stat-description {
            font-size: 12px;
            color: var(--muted);
        }

        .section-title {
            font-size: 16px;
            font-weight: 700;
            margin: 0;
        }

        .section-subtitle {
            font-size: 12px;
            color: var(--muted);
            margin-top: 5px;
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
            box-shadow: 0 0 0 3px rgba(49, 87, 213, .1);
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

        .status-badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 7px;
            font-size: 11px;
            font-weight: 650;
        }

        .status-borrowed {
            background: #fff4d6;
            color: #a16207;
        }

        .status-returned {
            background: #dcfce7;
            color: #15803d;
        }

        .stock-available {
            background: #dcfce7;
            color: #15803d;
        }

        .stock-empty {
            background: #fee2e2;
            color: #b91c1c;
        }

        .alert-custom {
            border: 1px solid transparent;
            border-radius: 13px;
            padding: 16px 18px;
            font-size: 13px;
        }

        .alert-late {
            background: #fff1f2;
            border-color: #fecdd3;
            color: #be123c;
        }

        .alert-safe {
            background: #ecfdf5;
            border-color: #bbf7d0;
            color: #15803d;
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

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }

            .page-title {
                font-size: 22px;
            }

            .content-card {
                padding: 17px;
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

            <div class="nav-label">MENU SISWA</div>

            <nav>
                <a href="{{ route('siswa.dashboard') }}" class="active">
                    <i class="bi bi-grid-1x2-fill"></i>
                    Dashboard
                </a>

                <a href="#katalog">
                    <i class="bi bi-book"></i>
                    Katalog Buku
                </a>

                <a href="#riwayat">
                    <i class="bi bi-journal-text"></i>
                    Riwayat Peminjaman
                </a>
            </nav>

            <div class="nav-label">AKUN</div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="btn w-100 text-start text-white-50 border-0"
                    style="padding:12px 14px;font-size:14px;">
                    <i class="bi bi-box-arrow-left me-2"></i>
                    Keluar
                </button>
            </form>

        </aside>

        <!-- MAIN CONTENT -->
        <main class="col-lg-10 main-content">

            <!-- HEADER -->
            <header class="topbar">
                <div>
                    <h1 class="page-title">Dashboard Siswa</h1>

                    <p class="page-subtitle">
                        Selamat datang kembali, {{ $user->name }}.
                    </p>

                    <div class="date-label mt-2">
                        <i class="bi bi-calendar3 me-1"></i>
                        {{ now()->translatedFormat('l, d F Y') }}
                    </div>
                </div>

                <div class="student-profile">
                    <div class="avatar">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>

                    <div>
                        <div class="fw-bold small">{{ $user->name }}</div>
                        <div class="text-secondary" style="font-size:11px;">
                            {{ $anggota->nis ?? 'NIS belum terhubung' }}
                            @if ($anggota)
                                · {{ $anggota->kelas }}
                            @endif
                        </div>
                    </div>
                </div>
            </header>

            <!-- INFORMASI SISWA -->
            @if (!$anggota)
                <div class="alert alert-warning rounded-3 mb-4">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    Akun ini belum terhubung dengan data anggota perpustakaan.
                    Hubungi Admin untuk menghubungkan akun.
                </div>
            @endif

            <!-- STATISTIK -->
            <div class="mb-4">
                <div class="mb-3">
                    <h5 class="section-title">Ringkasan Perpustakaan</h5>
                    <div class="section-subtitle">
                        Informasi katalog dan aktivitas peminjaman Anda.
                    </div>
                </div>

                <div class="row g-3">

                    <div class="col-sm-6 col-xl-4">
                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-title">Total Judul Buku</span>
                                <div class="stat-icon bg-primary-subtle text-primary">
                                    <i class="bi bi-book"></i>
                                </div>
                            </div>
                            <div class="stat-value text-primary">{{ $totalBuku }}</div>
                            <div class="stat-description">Judul buku terdaftar</div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-4">
                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-title">Stok Tersedia</span>
                                <div class="stat-icon bg-success-subtle text-success">
                                    <i class="bi bi-journals"></i>
                                </div>
                            </div>
                            <div class="stat-value text-success">{{ $stokTersedia }}</div>
                            <div class="stat-description">Eksemplar tersedia</div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-4">
                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-title">Sedang Dipinjam</span>
                                <div class="stat-icon bg-warning-subtle text-warning">
                                    <i class="bi bi-clock-history"></i>
                                </div>
                            </div>
                            <div class="stat-value text-warning">{{ $sedangDipinjam }}</div>
                            <div class="stat-description">Transaksi belum dikembalikan</div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-6">
                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-title">Transaksi Selesai</span>
                                <div class="stat-icon bg-success-subtle text-success">
                                    <i class="bi bi-check-circle"></i>
                                </div>
                            </div>
                            <div class="stat-value text-success">{{ $sudahDikembalikan }}</div>
                            <div class="stat-description">Buku sudah dikembalikan</div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-6">
                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-title">Peminjaman Terlambat</span>
                                <div class="stat-icon bg-danger-subtle text-danger">
                                    <i class="bi bi-exclamation-circle"></i>
                                </div>
                            </div>
                            <div class="stat-value text-danger">{{ $terlambat }}</div>
                            <div class="stat-description">Transaksi melewati batas pengembalian</div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- PERINGATAN KETERLAMBATAN -->
            @if ($terlambat > 0)
                <div class="alert-custom alert-late d-flex align-items-start gap-3 mb-4">
                    <i class="bi bi-exclamation-triangle-fill fs-5"></i>
                    <div>
                        <strong>Perhatian, ada buku yang terlambat!</strong>
                        <div class="mt-1">
                            Anda memiliki {{ $terlambat }} transaksi yang melewati
                            batas tanggal pengembalian. Segera kembalikan buku
                            ke perpustakaan.
                        </div>
                    </div>
                </div>
            @else
                <div class="alert-custom alert-safe d-flex align-items-start gap-3 mb-4">
                    <i class="bi bi-check-circle-fill fs-5"></i>
                    <div>
                        <strong>Semua aman!</strong>
                        <div class="mt-1">
                            Tidak ada peminjaman yang terlambat.
                            Tetap perhatikan batas pengembalian buku.
                        </div>
                    </div>
                </div>
            @endif

            <!-- KATALOG BUKU -->
            <div class="content-card mb-4" id="katalog">

                <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
                    <div>
                        <h5 class="section-title">Katalog Buku</h5>
                        <div class="section-subtitle">
                            Temukan buku yang tersedia di perpustakaan.
                        </div>
                    </div>

                    <span class="badge bg-primary-subtle text-primary px-3 py-2">
                        {{ $daftarBuku->count() }} Judul Buku
                    </span>
                </div>

                <div class="search-box mb-3">
                    <i class="bi bi-search"></i>
                    <input
                        type="text"
                        id="cariBuku"
                        class="form-control"
                        placeholder="Cari judul, pengarang, atau penerbit..."
                    >
                </div>

                <div class="table-responsive">
                    <table id="tabelKatalog" class="table align-middle">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Buku</th>
                                <th>Judul Buku</th>
                                <th>Pengarang</th>
                                <th>Penerbit</th>
                                <th>Tahun</th>
                                <th>Stok</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($daftarBuku as $buku)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-secondary">
                                        {{ $buku->kode_buku ?? '-' }}
                                    </td>
                                    <td class="fw-semibold">
                                        {{ $buku->judul }}
                                    </td>
                                    <td>{{ $buku->pengarang }}</td>
                                    <td>{{ $buku->penerbit }}</td>
                                    <td>{{ $buku->tahun_terbit }}</td>
                                    <td>
                                        @if ($buku->stok > 0)
                                            <span class="status-badge stock-available">
                                                {{ $buku->stok }} tersedia
                                            </span>
                                        @else
                                            <span class="status-badge stock-empty">
                                                Habis
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-secondary py-5">
                                        <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                        Belum ada buku yang terdaftar.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>

                <div id="hasilPencarian" class="small text-secondary mt-3"></div>
            </div>

            <!-- RIWAYAT PEMINJAMAN -->
            <div class="content-card" id="riwayat">

                <div class="mb-4">
                    <h5 class="section-title">Riwayat Peminjaman Saya</h5>
                    <div class="section-subtitle">
                        Daftar transaksi peminjaman buku Anda.
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="tabelRiwayat" class="table align-middle">

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Peminjaman</th>
                                <th>Judul Buku</th>
                                <th>Jumlah</th>
                                <th>Tanggal Pinjam</th>
                                <th>Batas Kembali</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($peminjaman as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td class="fw-semibold text-primary">
                                        {{ $item->kode_peminjaman ?? '-' }}
                                    </td>

                                    <td>{{ $item->buku->judul ?? '-' }}</td>

                                    <td>{{ $item->jumlah }}</td>

                                    <td>
                                        {{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d/m/Y') }}
                                    </td>

                                    <td>
                                        {{ \Carbon\Carbon::parse($item->tanggal_kembali)->format('d/m/Y') }}
                                    </td>

                                    <td>
                                        @if ($item->status === 'dipinjam')
                                            <span class="status-badge status-borrowed">
                                                Dipinjam
                                            </span>
                                        @else
                                            <span class="status-badge status-returned">
                                                Dikembalikan
                                            </span>
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ route('siswa.peminjaman.detail', $item->id) }}"
                                           class="btn btn-sm btn-primary px-3">
                                            <i class="bi bi-eye me-1"></i>
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center text-secondary py-5">
                                        <i class="bi bi-journal-x fs-3 d-block mb-2"></i>
                                        Belum ada riwayat peminjaman.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
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
    const pencarian = document.getElementById('cariBuku');
    const tabel = document.getElementById('tabelKatalog');
    const hasil = document.getElementById('hasilPencarian');

    if (!pencarian || !tabel) return;

    const barisBuku = tabel.querySelectorAll('tbody tr');

    pencarian.addEventListener('input', function () {
        const kata = this.value.toLowerCase().trim();
        let jumlahHasil = 0;

        barisBuku.forEach(function (baris) {
            const cocok = baris.textContent.toLowerCase().includes(kata);

            baris.style.display = cocok ? '' : 'none';

            if (cocok) {
                jumlahHasil++;
            }
        });

        if (hasil) {
            hasil.textContent = kata
                ? jumlahHasil + ' baris ditemukan.'
                : '';
        }
    });
});
</script>

</body>
</html>