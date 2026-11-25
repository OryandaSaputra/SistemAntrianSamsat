<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Akses akun SANRAS untuk mengelola antrean layanan SAMSAT Riau.">
    <title>@yield('title', 'Akun SANRAS')</title>
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
    @if (!app()->environment('testing'))
        @vite('resources/js/app.js')
    @endif
</head>
<body>
    @hasSection('container-login')
        @yield('container-login')
    @else
        <div class="auth-shell">
            <aside class="auth-aside">
                <a href="{{ route('home.public') }}" class="brand-lockup text-white"><img src="{{ asset('assets/img/logo.png') }}" alt="Logo SAMSAT Riau"><span><span class="brand-name text-white">SANRAS</span><span class="brand-caption" style="color:#cbd5e1">Sistem Antrean SAMSAT Riau</span></span></a>
                <div><span class="hero-eyebrow"><i class="bi bi-shield-check"></i> Bantuan akun</span><h1>Kelola akses Anda dengan aman.</h1><p>Ikuti langkah yang tersedia untuk melanjutkan penggunaan layanan digital SAMSAT Riau.</p></div>
                <a class="auth-back" href="{{ route('home.public') }}"><i class="bi bi-arrow-left me-2"></i>Kembali ke halaman utama</a>
            </aside>
            <main class="auth-content"><div class="auth-card">@yield('content')</div></main>
        </div>
    @endif
    @yield('script')
</body>
</html>
