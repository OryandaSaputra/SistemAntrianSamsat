
<div class="legacy-topbar">
    <div class="container">
        <div class="legacy-topbar-inner">
            <div class="legacy-topbar-contact">
                <a href="mailto:SamsatRiau@gmail.com">
                    <i class="bi bi-envelope" aria-hidden="true"></i>
                    <span>SamsatRiau@gmail.com</span>
                </a>

                <a href="tel:+6281234567899">
                    <i class="bi bi-telephone" aria-hidden="true"></i>
                    <span>+62 81234567899</span>
                </a>
            </div>

            <span class="legacy-topbar-note">
                Layanan Antrean Online SAMSAT Riau
            </span>
        </div>
    </div>
</div>


<header class="legacy-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light" aria-label="Navigasi utama">
            <a class="navbar-brand legacy-brand" href="<?php echo e(route('home.public')); ?>">
                <img
                    src="<?php echo e(asset('assets/img/logo.png')); ?>"
                    alt="Logo E-Riau SAMSAT"
                    width="56"
                    height="56">

                <span class="legacy-brand-text">
                    <strong>E-Riau SAMSAT</strong>
                    <small>Sistem Antrean Online</small>
                </span>
            </a>

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#publicNavigation"
                aria-controls="publicNavigation"
                aria-expanded="false"
                aria-label="Buka atau tutup navigasi">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse public-nav legacy-nav" id="publicNavigation">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('home.public')); ?>#hero">Beranda</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('antrian.index')); ?>">Antrian</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('home.public')); ?>#feedback">Umpan Balik</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('home.public')); ?>#panduan">Panduan</a>
                    </li>
                </ul>

                <div class="legacy-nav-actions">
                    <?php if(auth()->guard()->check()): ?>
                    <div class="dropdown">
                        <button
                            class="btn btn-outline-primary dropdown-toggle legacy-user-button"
                            type="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-person-circle me-1" aria-hidden="true"></i>
                            <?php echo e(auth()->user()->name); ?>

                        </button>

                        <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                            <?php if(optional(auth()->user()->role)->role === 'admin'): ?>
                            <li>
                                <a class="dropdown-item" href="<?php echo e(route('dashboard')); ?>">
                                    <i class="bi bi-speedometer2 me-2" aria-hidden="true"></i>
                                    Dashboard Admin
                                </a>
                            </li>
                            <?php else: ?>
                            <li>
                                <a class="dropdown-item" href="<?php echo e(route('antrian.index')); ?>">
                                    <i class="bi bi-ticket-perforated me-2" aria-hidden="true"></i>
                                    Menu Antrean
                                </a>
                            </li>
                            <?php endif; ?>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <form action="<?php echo e(route('logout')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-2" aria-hidden="true"></i>
                                        Keluar
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="appointment-btn">
                        Masuk
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </div>
</header><?php /**PATH D:\Project Website\Samsat Online\resources\views/partials/navbar.blade.php ENDPATH**/ ?>