@extends('layouts.app')
@section('title', 'Daftar — SANRAS')
@section('container-login')
<div class="auth-shell">
    <aside class="auth-aside">
        <a href="{{ route('home.public') }}" class="brand-lockup text-white"><img src="{{ asset('assets/img/logo.png') }}" alt="Logo SAMSAT Riau"><span><span class="brand-name text-white">SANRAS</span><span class="brand-caption" style="color:#cbd5e1">Sistem Antrean SAMSAT Riau</span></span></a>
        <div><span class="hero-eyebrow"><i class="bi bi-person-plus"></i> Mulai lebih praktis</span><h1>Satu akun untuk mengelola antrean Anda.</h1><p>Buat akun masyarakat untuk mengambil nomor antrean dan menyimpan informasi layanan Anda.</p></div>
        <a class="auth-back" href="{{ route('home.public') }}"><i class="bi bi-arrow-left me-2"></i>Kembali ke halaman utama</a>
    </aside>
    <main class="auth-content">
        <div class="auth-card">
            <span class="section-kicker">Pendaftaran masyarakat</span>
            <h2>Buat akun baru</h2>
            <p class="muted mb-4">Lengkapi data berikut untuk memulai.</p>
            @if ($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
            <form method="POST" action="{{ route('register') }}" class="d-grid gap-3">
                @csrf
                <div><label for="name" class="form-label">Nama lengkap</label><input id="name" type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" autocomplete="name" maxlength="255" required>@error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
                <div><label for="email" class="form-label">Alamat email</label><input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" autocomplete="email" maxlength="255" required>@error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
                <div><label for="password" class="form-label">Kata sandi</label><input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" autocomplete="new-password" minlength="8" required>@error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
                <div><label for="password_confirmation" class="form-label">Konfirmasi kata sandi</label><input id="password_confirmation" type="password" name="password_confirmation" class="form-control" autocomplete="new-password" minlength="8" required></div>
                <button class="btn btn-primary btn-lg" type="submit">Buat akun <i class="bi bi-arrow-right ms-1"></i></button>
            </form>
            <p class="text-center muted small mt-4 mb-0">Sudah memiliki akun? <a href="{{ route('login') }}" class="fw-bold">Masuk</a></p>
        </div>
    </main>
</div>
@endsection
