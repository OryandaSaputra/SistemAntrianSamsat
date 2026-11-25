<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Dashboard operasional Sistem Antrean SAMSAT Riau.">
    <meta name="theme-color" content="#111827">
    <title>@yield('title', 'Dashboard SANRAS')</title>
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
<body class="admin-shell">
    <header class="admin-topbar">
        <button class="sidebar-toggle" id="sidebarToggle" type="button" aria-label="Buka menu" aria-controls="adminSidebar" aria-expanded="false"><i class="bi bi-list"></i></button>
        <a class="admin-brand" href="{{ route('dashboard') }}">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo SAMSAT Riau">
            <span><strong>SANRAS</strong><small>ADMIN CONSOLE</small></span>
        </a>
        <div class="dropdown">
            <button class="btn p-0 border-0 bg-transparent admin-user" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="admin-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span>
                <span class="user-name">{{ auth()->user()->name }}</span>
                <i class="bi bi-chevron-down small"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-3">
                <li><span class="dropdown-item-text small text-secondary">Masuk sebagai administrator</span></li>
                <li><hr class="dropdown-divider"></li>
                <li><form action="{{ route('logout') }}" method="POST">@csrf<button type="submit" class="dropdown-item text-danger"><i class="bi bi-box-arrow-right me-2"></i>Keluar</button></form></li>
            </ul>
        </div>
    </header>

    <aside class="admin-sidebar" id="adminSidebar" aria-label="Navigasi dashboard">
        <div class="sidebar-label">Workspace</div>
        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}"><i class="bi bi-grid-1x2"></i>Ringkasan</a>
        <div class="sidebar-label mt-3">Operasional</div>
        <a href="{{ route('dashboard.antrian.bpkb') }}" class="{{ request()->routeIs('dashboard.antrian.bpkb') ? 'active' : '' }}"><i class="bi bi-car-front"></i>Antrean BPKB</a>
        <a href="{{ route('dashboard.antrian.stnk') }}" class="{{ request()->routeIs('dashboard.antrian.stnk') ? 'active' : '' }}"><i class="bi bi-card-checklist"></i>Antrean STNK</a>
        <a href="{{ route('dashboard.antrian.pajak') }}" class="{{ request()->routeIs('dashboard.antrian.pajak') ? 'active' : '' }}"><i class="bi bi-receipt"></i>Antrean Pajak</a>
        <a href="{{ route('dashboard.antrian.uji') }}" class="{{ request()->routeIs('dashboard.antrian.uji') ? 'active' : '' }}"><i class="bi bi-clipboard2-check"></i>Uji Kendaraan</a>
        <div class="sidebar-label mt-3">Insight</div>
        <a href="{{ route('dashboard.laporan.index') }}" class="{{ request()->routeIs('dashboard.laporan.*') ? 'active' : '' }}"><i class="bi bi-bar-chart-line"></i>Laporan</a>
        <a href="{{ route('dashboard.feedback.index') }}" class="{{ request()->routeIs('dashboard.feedback.*') ? 'active' : '' }}"><i class="bi bi-chat-square-text"></i>Umpan Balik</a>
        <div class="mt-4 p-3 rounded-4" style="background:rgba(255,255,255,.06)">
            <div class="small fw-bold text-white mb-1">SANRAS Console</div>
            <div class="small" style="color:#94a3b8">Kelola antrean layanan dengan lebih terstruktur.</div>
        </div>
    </aside>

    <main class="admin-content">
        @yield('content')
        <footer class="admin-footer">© {{ date('Y') }} SANRAS · Sistem Antrean SAMSAT Riau</footer>
    </main>

    <script>
        (function () {
            const toggle = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('adminSidebar');
            if (!toggle || !sidebar) return;
            toggle.addEventListener('click', function () {
                const opened = sidebar.classList.toggle('is-open');
                toggle.setAttribute('aria-expanded', opened ? 'true' : 'false');
            });
            document.addEventListener('click', function (event) {
                if (window.innerWidth < 992 && sidebar.classList.contains('is-open') && !sidebar.contains(event.target) && !toggle.contains(event.target)) {
                    sidebar.classList.remove('is-open');
                    toggle.setAttribute('aria-expanded', 'false');
                }
            });
        })();
    </script>
    @yield('script')
    @stack('scripts')
    @livewireScripts
</body>
</html>
