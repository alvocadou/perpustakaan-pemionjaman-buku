<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Peminjaman</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f1f5f9;
            font-family: Arial, sans-serif;
        }

        .main-content {
            max-width: 850px;
            margin: 50px auto;
            padding: 20px;
        }

        .detail-card {
            background: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,.05);
        }

        .detail-row {
            padding: 15px 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            color: #64748b;
            font-size: 14px;
        }

        .detail-value {
            font-weight: 600;
            color: #1e293b;
        }
    
        @media print {
            body {
                background: white !important;
            }

            .no-print {
                display: none !important;
            }

            .main-content {
                margin: 0 auto;
                padding: 0;
            }

            .detail-card {
                box-shadow: none;
                border: 1px solid #ddd;
            }
        }
    </style>
</head>

<body>

<div class="container main-content">

    <div class="d-flex justify-content-between align-items-center mb-4 no-print">
        <a href="{{ route('siswa.dashboard') }}" class="btn btn-outline-secondary">
            ← Kembali ke Dashboard
        </a>

        <button onclick="window.print()" class="btn btn-primary">
            Cetak Bukti
        </button>
    </div>

    <div class="detail-card">

        <div class="mb-4">
            <h3 class="fw-bold">Detail Peminjaman</h3>
            <p class="text-secondary mb-0">
                Informasi lengkap transaksi peminjaman buku.
            </p>
        </div>

        <div class="alert alert-primary">
            Kode Peminjaman:
            <strong>{{ $peminjaman->kode_peminjaman ?? '-' }}</strong>
        </div>

        <div class="detail-row">
            <div class="detail-label">Nama Siswa</div>
            <div class="detail-value">{{ $anggota->nama }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">NIS</div>
            <div class="detail-value">{{ $anggota->nis }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Judul Buku</div>
            <div class="detail-value">{{ $peminjaman->buku->judul ?? '-' }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Pengarang</div>
            <div class="detail-value">{{ $peminjaman->buku->pengarang ?? '-' }}</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Jumlah Buku</div>
            <div class="detail-value">{{ $peminjaman->jumlah }} eksemplar</div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Tanggal Peminjaman</div>
            <div class="detail-value">
                {{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d F Y') }}
            </div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Batas Pengembalian</div>
            <div class="detail-value">
                {{ \Carbon\Carbon::parse($peminjaman->tanggal_kembali)->format('d F Y') }}
            </div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Tanggal Pengembalian Aktual</div>
            <div class="detail-value">
                {{ $peminjaman->tanggal_pengembalian
                    ? \Carbon\Carbon::parse($peminjaman->tanggal_pengembalian)->format('d F Y')
                    : 'Belum dikembalikan' }}
            </div>
        </div>

        <div class="detail-row">
            <div class="detail-label">Status Peminjaman</div>
            <div class="detail-value mt-2">
                @if ($peminjaman->status === 'dipinjam')
                    <span class="badge bg-warning text-dark">Sedang Dipinjam</span>
                @else
                    <span class="badge bg-success">Sudah Dikembalikan</span>
                @endif
            </div>
        </div>

    </div>

</div>

</body>
</html>