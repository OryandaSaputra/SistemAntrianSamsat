# SANRAS — Sistem Antrean SAMSAT Riau

SANRAS adalah aplikasi antrean digital berbasis web untuk membantu masyarakat mengambil nomor antrean layanan SAMSAT dan membantu administrator mengelola antrean, memanggil pemohon, melihat laporan, serta meninjau umpan balik.

## Fitur utama

### Masyarakat
- Registrasi dan login akun.
- Mengambil nomor antrean untuk layanan BPKB, STNK, pajak kendaraan, dan uji kendaraan.
- Melihat daftar antrean milik sendiri dan status pemanggilan.
- Memperbarui data pemohon pada antrean yang masih menunggu; perubahan jenis layanan menerbitkan nomor baru pada layanan tujuan.
- Membatalkan antrean sendiri yang masih menunggu.
- Melihat daftar antrean hari ini tanpa mengekspos data pribadi pemohon lain.
- Mencetak tiket antrean PDF.
- Mengirim umpan balik setelah login.

### Administrator
- Ringkasan antrean hari ini, minggu ini, bulan ini, dan total data.
- Memantau antrean aktif per jenis layanan.
- Memanggil dan menandai antrean selesai.
- Menyaring riwayat antrean berdasarkan periode, layanan, atau kata kunci.
- Mengekspor laporan antrean ke PDF.
- Melihat detail dan menghapus umpan balik.

## Teknologi

| Area | Teknologi |
|---|---|
| Backend | PHP, Laravel 9 |
| UI server-rendered | Blade |
| Interaksi dinamis | Livewire 2 |
| CSS framework | Bootstrap 5 |
| Asset pipeline | Vite 4 |
| JavaScript | ES Modules, Bootstrap JS |
| Database | MySQL (default Laravel) |
| PDF | barryvdh/laravel-dompdf |
| Testing | PHPUnit |

> **Catatan lifecycle:** project masih menggunakan Laravel 9 dan Livewire 2 yang sudah melewati masa dukungan keamanan upstream. Upgrade framework dan Livewire ke versi yang masih didukung tetap direkomendasikan sebagai pekerjaan tersendiri. Upgrade major tidak dilakukan dalam paket ini karena perlu pengujian kompatibilitas dependency dan integrasi secara penuh.

## Persyaratan sistem

- PHP 8.1 atau 8.2 direkomendasikan untuk kompatibilitas project Laravel 9 ini (composer requirement saat ini: `^8.0.2`).
- Composer 2.x.
- Node.js 18+ dan npm 9+.
- MySQL 8.0 atau MariaDB yang kompatibel.
- Ekstensi PHP yang dibutuhkan Laravel dan DomPDF, minimal: `BCMath`, `Ctype`, `Fileinfo`, `JSON`, `Mbstring`, `OpenSSL`, `PDO`, `Tokenizer`, `XML`, dan driver PDO MySQL.

## Instalasi lokal

### 1. Ekstrak dan masuk ke folder project

```bash
unzip Sistem_Antrian_SANRAS-main.zip
cd Sistem_Antrian_SANRAS-main
```

### 2. Install dependency PHP dan JavaScript

```bash
composer install
npm ci
```

### 3. Siapkan environment

Linux/macOS:

```bash
cp .env.example .env
```

Windows PowerShell:

```powershell
Copy-Item .env.example .env
```

Buat database MySQL bernama `sanras`, kemudian sesuaikan konfigurasi database pada `.env`:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sanras
DB_USERNAME=root
DB_PASSWORD=
```

Generate application key:

```bash
php artisan key:generate
```

### 4. Siapkan akun administrator

Seeder tidak lagi membuat akun admin dengan password tetap. Isi kredensial admin sendiri di `.env` menggunakan password kuat:

```dotenv
SANRAS_ADMIN_NAME="Administrator SANRAS"
SANRAS_ADMIN_EMAIL=admin@domain-anda.id
SANRAS_ADMIN_PASSWORD="gunakan-password-kuat-dan-unik"
```

Jangan commit file `.env` ke repository. Untuk fitur reset kata sandi melalui email, ganti `MAIL_MAILER=log` dengan konfigurasi SMTP yang benar. Setelah itu jalankan migration dan seeder:

```bash
php artisan migrate --seed
```

Jika database sudah pernah di-seed dan Anda baru mengisi kredensial administrator, jalankan:

```bash
php artisan db:seed
```

Seeder membuat role `admin` dan `warga`, lalu membuat atau memperbarui akun admin hanya jika `SANRAS_ADMIN_EMAIL` dan `SANRAS_ADMIN_PASSWORD` tersedia. Jika database lama sudah pernah di-seed dengan akun demo berpassword tetap, rotasi password atau nonaktifkan akun lama tersebut secara manual setelah backup; seeder baru tidak menghapus akun yang sudah tersimpan.

### 5. Build asset frontend

Untuk development dengan Vite:

```bash
npm run dev
```

Jalankan aplikasi di terminal lain:

```bash
php artisan serve
```

Buka `http://127.0.0.1:8000`.

Untuk asset production:

```bash
npm run build
```

### 6. Menjalankan aplikasi

Development:

```bash
php artisan serve
```

Production:

- Arahkan document root Apache/Nginx ke folder `public/` (jangan arahkan document root ke root repository).
- Jalankan PHP-FPM atau handler PHP yang kompatibel dengan versi PHP project. Aplikasi dilayani oleh web server melalui `public/index.php`; `php artisan serve` hanya untuk development atau smoke-test, bukan web server production.
- Pastikan folder `storage/` dan `bootstrap/cache/` dapat ditulis oleh user web server.
- Set `APP_ENV=production`, `APP_DEBUG=false`, dan `APP_URL` ke domain HTTPS yang benar.
- Set `SESSION_SECURE_COOKIE=true`.
- Jalankan optimasi cache:

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Untuk membersihkan cache ketika konfigurasi berubah:

```bash
php artisan optimize:clear
```

## Database dan migration

Migration tambahan pada paket ini:

- `add_queue_lookup_index`: menambah index pencarian antrean berdasarkan layanan, tanggal, pengguna, dan status.
- `create_antrian_counters_table`: menyediakan counter unik per layanan dan tanggal agar nomor antrean dihasilkan dalam transaksi dan aman terhadap request bersamaan pada database yang mendukung row locking.

Jalankan:

```bash
php artisan migrate
```

Jangan menghapus atau mengubah data antrean produksi untuk menyelesaikan masalah migration tanpa backup dan pemeriksaan terlebih dahulu.

## Perintah pengembangan dan QA

```bash
# Pemeriksaan sintaks PHP manual
find app routes database -name '*.php' -print0 | xargs -0 -n1 php -l

# Menjalankan test suite
php artisan test

# Pemeriksaan dependency PHP
composer audit

# Pemeriksaan dependency JavaScript
npm audit

# Production build frontend
npm run build
```

## Keamanan dan catatan operasional

- Role pengguna baru ditetapkan server-side sebagai `warga`; request registrasi tidak dapat memilih role administrator.
- Aksi edit dan hapus antrean masyarakat memverifikasi kepemilikan data di backend.
- Data pribadi pemohon tidak ditampilkan pada tabel antrean publik.
- Endpoint pengelolaan umpan balik berada di dalam middleware autentikasi dan role admin.
- Pemanggilan antrean divalidasi ulang pada Livewire component dan dibatasi pada layanan serta tanggal yang sesuai.
- Nomor antrean dibuat melalui counter unik per layanan/tanggal dan database transaction, termasuk ketika layanan antrean diubah.
- Session cookie `HttpOnly` dan `SameSite=Lax`; cookie `Secure` otomatis aktif pada production kecuali dioverride oleh konfigurasi environment.
- Middleware menambahkan header keamanan dasar. HSTS hanya dikirim ketika request dikenali sebagai HTTPS.
- CORS tidak lagi mengizinkan semua origin secara default. Isi `CORS_ALLOWED_ORIGINS` hanya jika integrasi lintas origin memang diperlukan.

### Batasan yang masih perlu ditindaklanjuti

1. Laravel 9 dan Livewire 2 sudah tidak berada dalam masa dukungan keamanan upstream. Rencanakan upgrade terpisah dengan regression test.
2. Dependency Composer/npm belum dapat diaudit atau diperbarui di lingkungan pembuatan arsip ini karena Composer dan `node_modules` tidak tersedia.
3. Integrasi database, browser, dan PDF perlu diuji kembali pada environment staging yang terhubung ke database aktual.
4. Persyaratan layanan di halaman publik adalah panduan umum, bukan pengganti informasi resmi dari unit pelayanan SAMSAT.
5. Deployment production harus memakai HTTPS, kredensial unik, backup database, dan konfigurasi web server yang benar.

## Troubleshooting

| Gejala | Penyebab umum | Solusi |
|---|---|---|
| `No application encryption key has been specified` | `APP_KEY` belum dibuat | Jalankan `php artisan key:generate` setelah file `.env` tersedia. |
| `Vite manifest not found` | Asset belum dibuild dan Vite dev server tidak berjalan | Jalankan `npm ci` lalu `npm run build`, atau jalankan `npm run dev` selama development. |
| `SQLSTATE[HY000] [1045] Access denied` | Kredensial database salah | Periksa `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD`, lalu jalankan `php artisan config:clear`. |
| `Base table or view not found` | Migration belum dijalankan | Jalankan `php artisan migrate --seed` setelah database dibuat. |
| Akun admin tidak dapat digunakan | Kredensial admin belum diset di environment atau seeder belum dijalankan | Isi `SANRAS_ADMIN_EMAIL` dan `SANRAS_ADMIN_PASSWORD`, lalu jalankan `php artisan db:seed`. |
| `Permission denied` pada cache/session/log | Hak akses folder runtime belum benar | Berikan hak tulis pada `storage/` dan `bootstrap/cache/` kepada user web server. |
| Email reset kata sandi tidak diterima | Mailer masih menggunakan `log` atau SMTP belum benar | Konfigurasikan variabel `MAIL_*` pada `.env`, lalu bersihkan config cache. |

## Struktur folder penting

```text
app/
  Http/Controllers/       # Controller HTTP dan autentikasi
  Http/Livewire/          # Komponen Livewire antrean dan dashboard
  Http/Middleware/        # Middleware role dan security headers
  Models/                 # Model Eloquent
config/                   # Konfigurasi Laravel dan SANRAS
database/
  migrations/             # Struktur database dan index
  seeders/                # Role dan bootstrap admin dari environment
resources/
  css/                    # Design system SANRAS
  js/                     # Entry point Vite
  views/                  # Blade templates
public/assets/            # Logo, ikon, dan ilustrasi lokal
routes/                   # Definisi route web dan API
```

## Lisensi dan aset

Aplikasi ini menggunakan dependency open-source yang lisensinya mengikuti masing-masing package. Aset gambar/template yang sudah berada di project dipertahankan; pastikan hak penggunaan aset sesuai ketentuan pemiliknya sebelum distribusi publik.
