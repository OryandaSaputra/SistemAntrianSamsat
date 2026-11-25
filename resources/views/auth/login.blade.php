@extends('layouts.app')
@section('title', 'Masuk — SANRAS')
@section('container-login')
<div class="auth-shell">
    <aside class="auth-aside">
        <a href="{{ route('home.public') }}" class="brand-lockup text-white"><img src="{{ asset('assets/img/logo.png') }}" alt="Logo SAMSAT Riau"><span><span class="brand-name text-white">SANRAS</span><span class="brand-caption" style="color:#cbd5e1">Sistem Antrean SAMSAT Riau</span></span></a>
        <div><span class="hero-eyebrow"><i class="bi bi-shield-check"></i> Akses aman dan praktis</span><h1>Selamat datang kembali.</h1><p>Masuk untuk melihat tiket antrean, memperbarui data, dan mengakses layanan digital SAMSAT Riau.</p></div>
        <a class="auth-back" href="{{ route('home.public') }}"><i class="bi bi-arrow-left me-2"></i>Kembali ke halaman utama</a>
    </aside>
    <main class="auth-content">
        <div class="auth-card">
            <span class="section-kicker">Akun SANRAS</span>
            <h2>Masuk ke akun Anda</h2>
            <p class="muted mb-4">Gunakan email dan kata sandi yang terdaftar.</p>
            @if (session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
            @if (session('pending'))<div class="alert alert-warning">{{ session('pending') }}</div>@endif
            @if ($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
            <form method="POST" action="{{ route('login') }}" class="d-grid gap-3">
                @csrf
                <div><label for="email" class="form-label">Alamat email</label><input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" autocomplete="username" required autofocus>@error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
                <div><label for="password" class="form-label">Kata sandi</label><input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" autocomplete="current-password" required>@error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
                <div class="form-check"><input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}><label class="form-check-label small" for="remember">Ingat saya</label></div>
                <button class="btn btn-primary btn-lg" type="submit">Masuk <i class="bi bi-arrow-right ms-1"></i></button>
            </form>
            <p class="text-center muted small mt-4 mb-0">Belum memiliki akun? <a href="{{ route('register') }}" class="fw-bold">Daftar sekarang</a></p>
        </div>
    </main>
</div>
@endsection
