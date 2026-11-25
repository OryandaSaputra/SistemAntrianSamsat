<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="description" content="Sistem antrean digital SAMSAT Riau. Ambil dan pantau antrean layanan kendaraan secara online.">
    <meta name="theme-color" content="#111827">
    <title><?php echo $__env->yieldContent('title', 'SANRAS — Sistem Antrean SAMSAT Riau'); ?></title>
    <link rel="icon" href="<?php echo e(asset('assets/img/logo.png')); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')); ?>">
    <?php if(!app()->environment('testing')): ?>
        <?php echo app('Illuminate\Foundation\Vite')('resources/js/app.js'); ?>
    <?php endif; ?>
    <?php echo \Livewire\Livewire::styles(); ?>

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
    <?php echo $__env->make('partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main class="public-main">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    <?php echo $__env->make('partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        document.addEventListener('click', function (event) {
            const link = event.target.closest('.public-nav .nav-link');
            if (link) {
                const nav = document.getElementById('publicNavigation');
                if (nav && nav.classList.contains('show')) bootstrap.Collapse.getOrCreateInstance(nav).hide();
            }
        });
    </script>
    <?php echo $__env->yieldContent('script'); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>
    <?php echo \Livewire\Livewire::scripts(); ?>

</body>
</html>
<?php /**PATH D:\Project Website\Samsat Online\resources\views/layouts/main.blade.php ENDPATH**/ ?>