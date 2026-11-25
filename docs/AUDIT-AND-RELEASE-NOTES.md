# SANRAS — Audit dan Release Notes

## Ruang lingkup

Paket ini berangkat dari source archive `Sistem_Antrian_SANRAS-main.zip`. Redesign mengikuti konsep **Digital Queue — Modern SaaS Dashboard**: Midnight Navy, Electric Blue, Cyan, typography Manrope/Inter, dashboard berorientasi data, dan layout responsif.

## Perubahan utama

### UI/UX
- Menyatukan gaya visual publik, autentikasi, dan dashboard admin melalui satu design system di `resources/css/sanras-ui.css`.
- Menggunakan Vite sebagai entry point asset `resources/js/app.js`.
- Mendesain ulang landing page, navigasi, halaman antrean, login/register, ringkasan admin, daftar antrean, laporan, dan feedback.
- Mengganti navigasi dashboard menjadi sidebar responsif.
- Menambahkan status, empty state, form labels, focus-visible, reduced-motion support, dan layout mobile.

### Security dan data handling
- Registrasi tidak menerima `role_id` dari pengguna; role `warga` ditetapkan di backend.
- Memperbaiki redirect login/registrasi berdasarkan relasi `role`.
- Aksi edit/hapus antrean Livewire memverifikasi kepemilikan antrean. Perubahan jenis layanan pada antrean yang masih menunggu menerbitkan nomor baru menggunakan counter layanan tujuan.
- Nomor antrean dibuat dari counter unik layanan/tanggal dalam database transaction.
- Daftar antrean publik hanya memilih kolom non-sensitif: nomor, layanan, tanggal, status.
- Cetak tiket hanya tersedia bagi user terautentikasi dan hanya untuk antrean miliknya hari ini.
- Pengelolaan feedback dibatasi ke admin; route GET publik yang sebelumnya mengarah ke daftar feedback dihapus.
- Seeder tidak lagi membuat akun demo dengan password statis. Akun admin dibuat dari environment variable.
- Menambahkan header keamanan dasar, membatasi CORS default, dan mengatur secure session cookie untuk production.

### Functional dan maintainability
- Memperbaiki filter layanan agar menggunakan enum layanan yang benar.
- Memperbaiki filter laporan supaya periode, layanan, dan pencarian dapat dikombinasikan.
- Memperbaiki filter bulanan dengan mempertimbangkan tahun.
- Menambahkan index database untuk query antrean.
- Menghapus relasi `Feedback::user()` yang tidak didukung kolom `user_id` pada tabel feedback.
- Mengubah lokasi folder Livewire `DaftarLayanan` agar konsisten dengan case namespace PSR-4.
- Memperbarui README dan menambahkan `.env.example`.

## File/modul utama

- `routes/web.php`
- `app/Http/Controllers/Auth/RegisterController.php`
- `app/Http/Controllers/Auth/LoginController.php`
- `app/Http/Controllers/FeedbackController.php`
- `app/Http/Controllers/FrontAntrianController.php`
- `app/Http/Controllers/DashboardController.php`
- `app/Http/Controllers/DashboardLaporanController.php`
- `app/Http/Livewire/Antrian/ShowAntrian.php`
- `app/Http/Livewire/Dashboard/DaftarLayanan/*`
- `app/Http/Livewire/Dashboard/Laporan/ShowLaporan.php`
- `app/Http/Middleware/CheckRole.php`
- `app/Http/Middleware/SecurityHeaders.php`
- `resources/views/**`
- `resources/css/sanras-ui.css`
- `resources/js/app.js`
- `database/migrations/2024_07_20_000000_add_queue_lookup_index.php`
- `database/migrations/2024_07_20_000001_create_antrian_counters_table.php`
- `database/seeders/DatabaseSeeder.php`
- `.env.example`, `README.md`

## Validasi yang dilakukan

- Source PHP diperiksa menggunakan `php -l`: 80 file lulus pemeriksaan sintaks.
- Entry point JavaScript dan konfigurasi Vite lulus `node --check`; empat file JSON (Composer/package dan lockfile) berhasil diparse.
- Konsistensi route, middleware, namespace komponen Livewire, nama view, dan route helper diperiksa secara statis.
- Arsip akhir diperiksa untuk memastikan tidak memuat `.env`, `vendor`, `node_modules`, cache, atau file runtime sensitif.

## Validasi yang belum dapat dilakukan

- `php artisan test` dicoba, tetapi berhenti karena Composer dependency belum terpasang (`vendor/autoload.php` tidak tersedia).
- `npm ci` dicoba tetapi melewati batas waktu eksekusi; percobaan offline juga gagal karena paket tidak tersedia di cache. `npm run build` kemudian berhenti dengan `vite: not found` karena dependency belum terpasang.
- Database integration test dan migration terhadap database lama belum dapat dilakukan karena tidak ada koneksi database project.
- Browser/responsive testing, runtime Livewire, PDF render, dan console/network inspection belum dapat dilakukan tanpa aplikasi berjalan.
- `composer audit` dan `npm audit` belum dijalankan.

## Risiko residual

- Laravel 9 (lock v9.48.0) dan Livewire 2 (v2.11.1) sudah melewati masa dukungan keamanan upstream. Paket ini mempertahankan versi agar tidak melakukan upgrade major yang tidak bisa diuji di lingkungan ini. Upgrade framework tetap prioritas sebelum deployment produksi.
- Composer dependencies termasuk `barryvdh/laravel-dompdf` v2.0.0 dan `dompdf/dompdf` v2.0.1 belum diperbarui karena Composer tidak tersedia. Jalankan `composer audit` setelah dependency terpasang dan lakukan upgrade teruji terhadap advisory yang dilaporkan.
- Database lama yang sudah pernah di-seed mungkin masih menyimpan akun demo/password lama; administrator perlu merotasi atau menonaktifkannya secara manual. Seeder baru tidak menghapus akun yang sudah ada.
- Foreign key pada `users.role_id` dan `antrians.user_id` belum ditambahkan karena database aktual tidak tersedia untuk memeriksa orphan records. Lakukan pemeriksaan data dan backup sebelum menambahkan constraint pada database existing.
- HSTS dan secure cookie membutuhkan konfigurasi HTTPS/reverse proxy yang benar pada deployment.
- Periksa dan backup database sebelum menjalankan migration tambahan pada database produksi.
