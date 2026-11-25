<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Sistem antrean digital SAMSAT Riau. Ambil dan pantau antrean layanan kendaraan secara online.">
    <meta name="theme-color" content="#111827">
    <title>@yield('title', 'SANRAS — Sistem Antrean SAMSAT Riau')</title>
    <link rel="icon" href="{{ asset('assets/img/logo.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}">
    @if (!app()->environment('testing'))
        @vite('resources/js/app.js')
    @endif
    @livewireStyles
    @stack('styles')
</head>
<body>
    @include('partials.navbar')
    <main class="public-main">
        @yield('content')
    </main>
    @include('partials.footer')
    <script>
        document.addEventListener('click', function (event) {
            const link = event.target.closest('.public-nav .nav-link');
            if (link) {
                const nav = document.getElementById('publicNavigation');
                if (nav && nav.classList.contains('show')) bootstrap.Collapse.getOrCreateInstance(nav).hide();
            }
        });
    </script>
    @yield('script')
    @stack('scripts')
    @livewireScripts
</body>
</html>
