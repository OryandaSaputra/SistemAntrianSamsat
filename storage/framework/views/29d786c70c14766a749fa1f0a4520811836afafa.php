<?php $__env->startSection('title', 'Antrean Pajak Kendaraan — SANRAS'); ?>
<?php $__env->startSection('content'); ?>
<div class="admin-page-header"><div><span class="admin-eyebrow">Operasional · Antrean layanan</span><h1>Antrean Pajak Kendaraan</h1><p>Kelola nomor yang masih menunggu untuk layanan Pajak Kendaraan.</p></div><a href="<?php echo e(route('dashboard')); ?>" class="btn btn-outline-primary"><i class="bi bi-arrow-left me-2"></i>Ringkasan</a></div>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('dashboard.daftar-layanan.dashboard-antrian-pajak', [])->html();
} elseif ($_instance->childHasBeenRendered('ocKl4en')) {
    $componentId = $_instance->getRenderedChildComponentId('ocKl4en');
    $componentTag = $_instance->getRenderedChildComponentTagName('ocKl4en');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ocKl4en');
} else {
    $response = \Livewire\Livewire::mount('dashboard.daftar-layanan.dashboard-antrian-pajak', []);
    $html = $response->html();
    $_instance->logRenderedChild('ocKl4en', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>window.addEventListener('closeModal', function () { var modal = document.getElementById('panggilAntrian'); if (modal) bootstrap.Modal.getOrCreateInstance(modal).hide(); });</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project Website\Samsat Online\resources\views/dashboard/antrian/pajak.blade.php ENDPATH**/ ?>