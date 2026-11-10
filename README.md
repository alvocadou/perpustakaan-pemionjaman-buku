# Perpustakaan Digital

Aplikasi manajemen perpustakaan digital berbasis Laravel untuk mengelola koleksi buku, anggota, peminjaman, dan pengembalian buku.

## Fitur

### Admin
- Dashboard statistik perpustakaan.
- Manajemen data buku.
- Manajemen data anggota.
- Pencatatan peminjaman dan pengembalian.
- Pengelolaan akun siswa.
- Laporan peminjaman.

### Siswa
- Login akun siswa.
- Melihat katalog buku.
- Mencari buku.
- Melihat riwayat peminjaman.
- Melihat status keterlambatan.
- Melihat detail peminjaman.

## Teknologi

- PHP
- Laravel 12
- MySQL / MariaDB
- Bootstrap 5
- Bootstrap Icons
- JavaScript

## Persyaratan

- PHP sesuai persyaratan Laravel 12.
- Composer.
- MySQL atau MariaDB.
- XAMPP.
- Git.

## Instalasi

1. Clone repository:

   ```bash
   git clone URL_REPOSITORY
   ```

2. Masuk ke folder project:

   ```bash
   cd perpustakaan
   ```

3. Install dependency:

   ```bash
   composer install
   ```

4. Salin konfigurasi:

   ```bash
   copy .env.example .env
   ```

5. Buat application key:

   ```bash
   php artisan key:generate
   ```

6. Buat database bernama `perpustakaan` melalui phpMyAdmin.

7. Atur konfigurasi database pada file `.env`.

8. Jalankan migrasi:

   ```bash
   php artisan migrate
   ```

9. Jalankan aplikasi melalui Apache XAMPP atau server Laravel.

## Catatan

- File `.env` tidak disertakan dalam repository.
- Sesuaikan konfigurasi database dengan lingkungan masing-masing.
- Pastikan Apache dan MySQL XAMPP aktif saat menjalankan aplikasi.