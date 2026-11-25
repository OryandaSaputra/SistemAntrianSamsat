# SANRAS — E-Riau SAMSAT Digital Queue

SANRAS (E-Riau SAMSAT) adalah aplikasi web antrean digital yang dikembangkan sebagai proyek akademik kelompok untuk studi kasus layanan SAMSAT Pekanbaru.

Aplikasi ini membantu masyarakat mengambil dan mengelola nomor antrean layanan, memantau status antrean, serta mencetak tiket. Administrator dapat memantau antrean per layanan, melakukan pemanggilan, mengelola laporan, dan meninjau umpan balik pengguna.

> **Project context:** Academic group project — Politeknik Caltex Riau, Tahun Akademik 2023/2024.  
> **Notice:** This is an academic project/prototype, not an official SAMSAT government platform and not an online vehicle-tax payment gateway.

## Project Overview

Pengembangan proyek berangkat dari kebutuhan untuk menyediakan alur antrean digital dan informasi layanan yang lebih mudah diakses. Sistem dirancang dengan area pengunjung, masyarakat terdaftar, dan administrator.

### Key Features

#### Masyarakat
- Registrasi dan login akun.
- Mengambil nomor antrean untuk layanan BPKB, STNK, pajak kendaraan, dan uji kendaraan.
- Melihat antrean milik sendiri dan status pemanggilan.
- Memperbarui data antrean yang masih menunggu.
- Membatalkan antrean sendiri yang masih menunggu.
- Melihat daftar antrean aktif tanpa membuka data pribadi pemohon lain.
- Mencetak tiket antrean dalam format PDF.
- Mengirim umpan balik setelah login.

#### Administrator
- Melihat ringkasan antrean.
- Memantau antrean aktif berdasarkan jenis layanan.
- Memanggil dan menandai antrean selesai.
- Menyaring laporan antrean berdasarkan periode dan layanan.
- Mengekspor laporan antrean ke PDF.
- Melihat detail dan menghapus umpan balik.

#### Informasi Publik
- Menampilkan informasi layanan dan persyaratan.
- Menyediakan panduan penggunaan sistem.

## My Contribution

Proyek ini dikembangkan secara berkelompok. Kontribusi saya dalam proyek berdasarkan pembagian tugas pada laporan akhir meliputi:

- **Frontend — Admin:** alert/konfirmasi penghapusan umpan balik.
- **Frontend — User:** alert/notifikasi setelah pengiriman umpan balik.
- **Backend — Admin:** bagian antrean masuk pada dashboard administrator.
- **Backend — Admin:** proses penghapusan laporan antrean.
- **Backend — User:** kontribusi pada alur login pengguna untuk fitur umpan balik.
- **Documentation:** prototype antarmuka.

Kontribusi anggota tim lainnya merupakan bagian dari pengembangan kelompok dan tidak diklaim sebagai pekerjaan individu saya.

## Technology Stack

| Area | Technology |
|---|---|
| Backend | PHP |
| Framework | Laravel 9 |
| Template | Blade |
| Reactive UI | Livewire 2 |
| CSS Framework | Bootstrap 5 |
| Frontend Build | Vite 4 |
| Database | MySQL |
| PDF Generation | barryvdh/laravel-dompdf |
| Testing Framework | PHPUnit |

### Locked Dependency Versions

Versi pada lockfile paket yang diperiksa:
- Laravel Framework: `v9.48.0`
- Livewire: `v2.11.1`
- Bootstrap: `v5.2.3`
- Vite: `v4.0.4`
- DomPDF: `v2.0.1`

## Requirements

- PHP 8.1 atau 8.2 direkomendasikan.
- Composer 2.x.
- Node.js 18+ dan npm 9+.
- MySQL 8.0 atau MariaDB yang kompatibel.
- PHP extensions yang dibutuhkan Laravel, termasuk PDO MySQL, OpenSSL, Mbstring, Tokenizer, XML, Ctype, Fileinfo, dan JSON.

Composer project requirement saat ini adalah PHP `^8.0.2`. Versi PHP yang digunakan harus tetap kompatibel dengan dependency yang terkunci.

## Installation

### 1. Clone repository

```bash
git clone https://github.com/USERNAME_GITHUB/sanras-digital-queue.git
cd sanras-digital-queue
```

### 2. Install PHP dependencies

```bash
composer install
```

### 3. Install JavaScript dependencies

```bash
npm ci
```

### 4. Configure environment

Windows PowerShell:

```powershell
Copy-Item .env.example .env
```

Linux/macOS:

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

### 5. Configure database

Buat database MySQL dengan nama `sanras`, kemudian sesuaikan `.env`:

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sanras
DB_USERNAME=root
DB_PASSWORD=
```

Gunakan username dan password database sesuai environment lokal Anda.

### 6. Configure administrator account

Isi variabel berikut di `.env` dengan email dan password administrator yang kuat:

```dotenv
SANRAS_ADMIN_NAME="Administrator SANRAS"
SANRAS_ADMIN_EMAIL=admin@example.com
SANRAS_ADMIN_PASSWORD="GANTI_DENGAN_PASSWORD_KUAT"
```

Jangan commit `.env` ke GitHub.

### 7. Run database migrations and seeders

```bash
php artisan migrate --seed
```

Seeder membuat role `admin` dan `warga`. Akun admin dibuat dari variabel environment jika email dan password admin sudah diisi.

Jika database sudah pernah di-seed sebelum kredensial admin diisi, jalankan:

```bash
php artisan db:seed
```

### 8. Run frontend and application

Terminal pertama:

```bash
npm run dev
```

Terminal kedua:

```bash
php artisan serve
```

Open:

```text
http://127.0.0.1:8000
```

### 9. Production build

```bash
npm run build
```

## Useful Commands

```bash
# Clear Laravel caches
php artisan optimize:clear

# Run tests
php artisan test

# Audit PHP dependencies
composer audit

# Audit JavaScript dependencies
npm audit

# Build frontend assets
npm run build
```

## Project Structure

```text
app/
  Http/Controllers/       # HTTP controllers and authentication
  Http/Livewire/          # Queue and admin Livewire components
  Http/Middleware/        # Authentication, role, and security middleware
  Models/                 # Eloquent models

config/                   # Laravel and SANRAS configuration
database/
  migrations/             # Database schema and indexes
  seeders/                # Role and administrator bootstrap

public/assets/            # Static images, icons, and local assets

resources/
  css/                    # SANRAS design system
  js/                     # Vite entry point
  views/                  # Blade templates

routes/                   # Web and API routes
tests/                    # PHPUnit tests
```

## Security Notes

- Never commit `.env`, credentials, API keys, tokens, or database dumps.
- Configure a unique and strong administrator password.
- Use HTTPS in production.
- Set `APP_DEBUG=false` in production.
- Configure database credentials through environment variables.
- Back up the database before running migrations on an existing deployment.
- Review user-generated data and uploaded assets before publishing screenshots or demo data.

## Known Limitations

- Laravel 9 and Livewire 2 are older major versions. Plan a separately tested upgrade to supported versions before long-term production use.
- This project focuses on queue management and service information; it does not process vehicle-tax payments online.
- Integration with official SAMSAT systems or government databases is not claimed.
- Production deployment, external integrations, and database migration must be tested in the target environment.

## Project Attribution

Academic group project developed at **Politeknik Caltex Riau** for the course/project **TIK untuk Peningkatan Layanan Publik**.

Individual contributions are described in the **My Contribution** section above. Add the names of other contributors only after confirming the preferred attribution with the team.

## License

No license is declared yet. Because this is a group project, confirm ownership, permission from contributors, and asset licenses before adding an open-source license.
