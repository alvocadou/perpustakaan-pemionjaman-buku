<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | Perpustakaan Digital</title>

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
            background: #3157d5;
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

        .admin-profile {
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

        .stat-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 21px;
            height: 100%;
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
            margin: 18px 0 4px;
            letter-spacing: -.7px;
        }

        .stat-description {
            font-size: 12px;
            color: var(--muted);
        }

        .content-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 24px;
            height: 100%;
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

        .btn-primary {
            background: var(--primary);
            border-color: var(--primary);
        }

        .btn-primary:hover {
            background: #2446b8;
            border-color: #2446b8;
        }

        .chart-container {
            position: relative;
            height: 260px;
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

            <div class="nav-label">MENU UTAMA</div>

            <nav>
                <a href="{{ route('dashboard') }}"
                   class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="bi bi-grid-1x2-fill"></i>
                    Dashboard
                </a>

                <a href="{{ route('buku.index') }}"
                   class="{{ request()->routeIs('buku.*') ? 'active' : '' }}">
                    <i class="bi bi-book"></i>
                    Data Buku
                </a>

                <a href="{{ route('anggota.index') }}"
                   class="{{ request()->routeIs('anggota.*') ? 'active' : '' }}">
                    <i class="bi bi-people"></i>
                    Data Anggota
                </a>

                <a href="{{ route('peminjaman.index') }}"
                   class="{{ request()->routeIs('peminjaman.*') ? 'active' : '' }}">
                    <i class="bi bi-journal-arrow-up"></i>
                    Peminjaman
                </a>

                <a href="{{ route('akun-siswa.index') }}"
                   class="{{ request()->routeIs('akun-siswa.*') ? 'active' : '' }}">
                    <i class="bi bi-person-badge"></i>
                    Akun Siswa
                </a>

                <a href="{{ route('laporan.index') }}"
                   class="{{ request()->routeIs('laporan.*') ? 'active' : '' }}">
                    <i class="bi bi-file-earmark-bar-graph"></i>
                    Laporan
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
                    <h1 class="page-title">Dashboard</h1>
                    <p class="page-subtitle">
                        Selamat datang di Sistem Informasi Perpustakaan Digital.
                    </p>
                    <div class="date-label mt-2">
                        <i class="bi bi-calendar3 me-1"></i>
                        {{ now()->translatedFormat('l, d F Y') }}
                    </div>
                </div>

                <div class="admin-profile">
                    <div class="avatar">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div>
                        <div class="fw-bold small">{{ Auth::user()->name }}</div>
                        <div class="text-secondary" style="font-size:11px;">Administrator</div>
                    </div>
                </div>
            </header>

            <!-- STATISTIK -->
            <div class="mb-4">
                <div class="mb-3">
                    <h5 class="section-title">Ringkasan Perpustakaan</h5>
                    <div class="section-subtitle">Informasi data dan aktivitas perpustakaan.</div>
                </div>

                <div class="row g-3">

                    <div class="col-sm-6 col-xl-4">
                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-title">Total Buku</span>
                                <div class="stat-icon bg-primary-subtle text-primary">
                                    <i class="bi bi-book"></i>
                                </div>
                            </div>
                            <div class="stat-value">{{ $totalBuku }}</div>
                            <div class="stat-description">Jumlah judul buku terdaftar</div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-4">
                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-title">Total Anggota</span>
                                <div class="stat-icon bg-success-subtle text-success">
                                    <i class="bi bi-people"></i>
                                </div>
                            </div>
                            <div class="stat-value">{{ $totalAnggota }}</div>
                            <div class="stat-description">Anggota perpustakaan terdaftar</div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-4">
                        <div class="stat-card">
                            <div class="stat-top">
                                <span class="stat-title">Total Peminjaman</span>
                                <div class="stat-icon bg-info-subtle text-info">
                                    <i class="bi bi-journal-text"></i>
                                </div>
                            </div>
                            <div class="stat-value">{{ $totalPeminjaman }}</div>
                            <div class="stat-description">Seluruh transaksi peminjaman</div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-6">
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
                                <span class="stat-title">Sudah Dikembalikan</span>
                                <div class="stat-icon bg-success-subtle text-success">
                                    <i class="bi bi-check-circle"></i>
                                </div>
                            </div>
                            <div class="stat-value text-success">{{ $sudahDikembalikan }}</div>
                            <div class="stat-description">Transaksi yang sudah selesai</div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- GRAFIK -->
            <div class="content-card mb-4">
                <div class="mb-4">
                    <h5 class="section-title">Statistik Peminjaman</h5>
                    <div class="section-subtitle">Perbandingan seluruh transaksi peminjaman.</div>
                </div>

                <div class="chart-container">
                    <canvas id="grafikPeminjaman"></canvas>
                </div>
            </div>

            <!-- PEMINJAMAN TERBARU -->
            <div class="content-card">

                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
                    <div>
                        <h5 class="section-title">Peminjaman Terbaru</h5>
                        <div class="section-subtitle">Lima transaksi terakhir perpustakaan.</div>
                    </div>

                    <a href="{{ route('peminjaman.index') }}" class="btn btn-primary btn-sm px-3">
                        Lihat Semua
                        <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle">

                        <thead>
                            <tr>
                                <th>Kode Peminjaman</th>
                                <th>Nama Anggota</th>
                                <th>Judul Buku</th>
                                <th>Jumlah</th>
                                <th>Tanggal Pinjam</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($peminjamanTerbaru as $item)
                                <tr>
                                    <td class="fw-semibold text-primary">
                                        {{ $item->kode_peminjaman ?? '-' }}
                                    </td>

                                    <td>{{ $item->anggota->nama ?? '-' }}</td>

                                    <td>{{ $item->buku->judul ?? '-' }}</td>

                                    <td>{{ $item->jumlah }}</td>

                                    <td>
                                        {{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d/m/Y') }}
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
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-secondary py-5">
                                        <i class="bi bi-inbox fs-3 d-block mb-2"></i>
                                        Belum ada data peminjaman.
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

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const canvas = document.getElementById('grafikPeminjaman');

    if (!canvas) return;

    new Chart(canvas, {
        type: 'bar',
        data: {
            labels: [
                'Total Transaksi',
                'Sedang Dipinjam',
                'Dikembalikan'
            ],
            datasets: [{
                label: 'Jumlah Transaksi',
                data: [
                    {{ $totalPeminjaman }},
                    {{ $sedangDipinjam }},
                    {{ $sudahDikembalikan }}
                ],
                backgroundColor: [
                    '#3157d5',
                    '#f59e0b',
                    '#10b981'
                ],
                borderRadius: 8,
                maxBarThickness: 65
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0
                    },
                    grid: {
                        color: '#f0f2f6'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
});
</script>

</body>
</html>