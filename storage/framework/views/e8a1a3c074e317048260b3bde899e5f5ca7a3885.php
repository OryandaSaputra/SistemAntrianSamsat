<?php $__env->startSection('title', 'Antrean Saya — E-Riau SAMSAT'); ?>

<?php $__env->startPush('styles'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/css/queue-page.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="queue-page">
    <div class="container queue-container">

        
        <section class="queue-hero" aria-labelledby="queuePageTitle">
            <div class="queue-hero-content">
                <span class="queue-eyebrow">
                    <i class="bi bi-calendar-check" aria-hidden="true"></i>
                    Layanan antrean digital SAMSAT Riau
                </span>

                <h1 id="queuePageTitle">
                    Antrean lebih mudah,<br class="d-none d-sm-block">
                    layanan lebih teratur.
                </h1>

                <p>
                    Ambil nomor antrean, pantau status layanan, dan kelola tiket
                    Anda secara online dalam satu tempat.
                </p>

                <div class="queue-hero-features" aria-label="Keunggulan layanan">
                    <span><i class="bi bi-check-circle-fill" aria-hidden="true"></i> Mudah digunakan</span>
                    <span><i class="bi bi-check-circle-fill" aria-hidden="true"></i> Informasi antrean</span>
                    <span><i class="bi bi-check-circle-fill" aria-hidden="true"></i> Tiket digital</span>
                </div>
            </div>

            <div class="queue-hero-action">
                <?php if(auth()->guard()->check()): ?>
                <button
                    class="btn queue-hero-button"
                    type="button"
                    data-bs-toggle="modal"
                    data-bs-target="#createAntrian">
                    <i class="bi bi-plus-lg" aria-hidden="true"></i>
                    <span>Ambil antrean</span>
                </button>
                <small>Mulai dengan memilih jenis layanan.</small>
                <?php else: ?>
                <a href="<?php echo e(route('login')); ?>" class="btn queue-hero-button">
                    <i class="bi bi-box-arrow-in-right" aria-hidden="true"></i>
                    <span>Masuk untuk antre</span>
                </a>
                <small>Masuk ke akun Anda untuk membuat tiket antrean.</small>
                <?php endif; ?>
            </div>

            <div class="queue-hero-decoration" aria-hidden="true"></div>
        </section>

        
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('antrian.show-antrian', [])->html();
} elseif ($_instance->childHasBeenRendered('0FeHFXP')) {
    $componentId = $_instance->getRenderedChildComponentId('0FeHFXP');
    $componentTag = $_instance->getRenderedChildComponentTagName('0FeHFXP');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('0FeHFXP');
} else {
    $response = \Livewire\Livewire::mount('antrian.show-antrian', []);
    $html = $response->html();
    $_instance->logRenderedChild('0FeHFXP', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

        <div class="queue-page-note">
            <i class="bi bi-shield-check" aria-hidden="true"></i>
            <span>
                Data pribadi antrean hanya dapat dilihat oleh pemilik akun.
                Daftar antrean publik hanya menampilkan nomor dan jenis layanan.
            </span>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    window.addEventListener('closeModal', function() {
        ['createAntrian', 'editAntrian', 'deleteAntrian'].forEach(function(id) {
            const element = document.getElementById(id);

            if (element && window.bootstrap) {
                window.bootstrap.Modal.getOrCreateInstance(element).hide();
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project Website\Samsat Online\resources\views/antrian/index.blade.php ENDPATH**/ ?>