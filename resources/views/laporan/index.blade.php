<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Peminjaman</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f1f5f9;
            font-family: Arial, sans-serif;
        }

        .main-content {
            padding: 32px;
        }

        .report-card {
            background: white;
            border: none;
            border-radius: 14px;
            padding: 24px;
            box-shadow: 0 4px 15px rgba(0,0,0,.04);
            height: 100%;
        }

        .stat-number {
            font-size: 30px;
            font-weight: bold;
        }

        .table th {
            color: #64748b;
            font-size: 13px;
            white-space: nowrap;
        }

        .table td {
            font-size: 14px;
            white-space: nowrap;
        }

        @media print {
            body {
                background: white;
            }

            .no-print {
                display: none !important;
            }

            .main-content {
                padding: 0;
            }

            .report-card {
                box-shadow: none;
                border: 1px solid #ddd;
            }
        }
    </style>
</head>

<body>

<main class="container-fluid main-content">

    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3 no-print">
        <div>
            <h3 class="fw-bold mb-1">Laporan Peminjaman</h3>
            <p class="text-secondary mb-0">
                Rekap transaksi perpustakaan digital.
            </p>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
                Kembali
            </a>

            <a href="{{ route('laporan.export', request()->query()) }}"
               class="btn btn-success">
                Download CSV
            </a>

            <button onclick="window.print()" class="btn btn-primary">
                Cetak Laporan
            </button>
        </div>
    </div>

    <!-- STATISTIK -->
    <div class="row g-3 mb-4">

        <div class="col-md-4">
            <div class="report-card">
                <div class="text-secondary">Total Transaksi</div>
                <div class="stat-number text-primary">
                    {{ $totalTransaksi }}
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="report-card">
                <div class="text-secondary">Sedang Dipinjam</div>
                <div class="stat-number text-warning">
                    {{ $totalDipinjam }}
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="report-card">
                <div class="text-secondary">Sudah Dikembalikan</div>
                <div class="stat-number text-success">
                    {{ $totalDikembalikan }}
                </div>
            </div>
        </div>

    </div>

    <!-- FILTER -->
    <div class="report-card mb-4 no-print">

        <h5 class="fw-bold mb-3">Filter Laporan</h5>

        <form action="{{ route('laporan.index') }}" method="GET">

            <div class="row g-3">

                <div class="col-md-4">
                    <label class="form-label">Tanggal Mulai</label>
                    <input
                        type="date"
                        name="tanggal_mulai"
                        class="form-control"
                        value="{{ request('tanggal_mulai') }}"
                    >
                </div>

                <div class="col-md-4">
                    <label class="form-label">Tanggal Selesai</label>
                    <input
                        type="date"
                        name="tanggal_selesai"
                        class="form-control"
                        value="{{ request('tanggal_selesai') }}"
                    >
                </div>

                <div class="col-md-4">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="semua" {{ request('status') === 'semua' ? 'selected' : '' }}>
                            Semua Status
                        </option>

                        <option value="dipinjam" {{ request('status') === 'dipinjam' ? 'selected' : '' }}>
                            Sedang Dipinjam
                        </option>

                        <option value="dikembalikan" {{ request('status') === 'dikembalikan' ? 'selected' : '' }}>
                            Dikembalikan
                        </option>
                    </select>
                </div>

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">
                        Terapkan Filter
                    </button>

                    <a href="{{ route('laporan.index') }}" class="btn btn-outline-secondary">
                        Reset
                    </a>
                </div>

            </div>

        </form>

    </div>

    <!-- TABEL LAPORAN -->
    <div class="report-card">

        <div class="mb-3">
            <h5 class="fw-bold">Data Transaksi Peminjaman</h5>
            <small class="text-secondary">
                Dicetak pada {{ now()->format('d/m/Y H:i') }}
            </small>
        </div>

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Peminjaman</th>
                        <th>Nama Siswa</th>
                        <th>Judul Buku</th>
                        <th>Jumlah</th>
                        <th>Tanggal Pinjam</th>
                        <th>Batas Kembali</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($laporan as $item)

                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                {{ $item->kode_peminjaman ?? '-' }}
                            </td>

                            <td>
                                {{ $item->anggota->nama ?? '-' }}
                            </td>

                            <td>
                                {{ $item->buku->judul ?? '-' }}
                            </td>

                            <td>{{ $item->jumlah }}</td>

                            <td>
                                {{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d/m/Y') }}
                            </td>

                            <td>
                                {{ \Carbon\Carbon::parse($item->tanggal_kembali)->format('d/m/Y') }}
                            </td>

                            <td>
                                @if ($item->status === 'dipinjam')
                                    <span class="badge bg-warning text-dark">
                                        Dipinjam
                                    </span>
                                @else
                                    <span class="badge bg-success">
                                        Dikembalikan
                                    </span>
                                @endif
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="8" class="text-center text-secondary py-4">
                                Tidak ada data transaksi.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>
    </div>

    <footer class="text-center text-secondary mt-4 small">
        Sistem Informasi Perpustakaan Digital
    </footer>

</main>

</body>
</html>