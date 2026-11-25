<?php $__env->startSection('title', 'Antrean BPKB — SANRAS'); ?>
<?php $__env->startSection('content'); ?>
<div class="admin-page-header"><div><span class="admin-eyebrow">Operasional · Antrean layanan</span><h1>Antrean BPKB</h1><p>Kelola nomor yang masih menunggu untuk layanan BPKB.</p></div><a href="<?php echo e(route('dashboard')); ?>" class="btn btn-outline-primary"><i class="bi bi-arrow-left me-2"></i>Ringkasan</a></div>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('dashboard.daftar-layanan.dashboard-antrian-bpkb', [])->html();
} elseif ($_instance->childHasBeenRendered('SuutQyY')) {
    $componentId = $_instance->getRenderedChildComponentId('SuutQyY');
    $componentTag = $_instance->getRenderedChildComponentTagName('SuutQyY');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('SuutQyY');
} else {
    $response = \Livewire\Livewire::mount('dashboard.daftar-layanan.dashboard-antrian-bpkb', []);
    $html = $response->html();
    $_instance->logRenderedChild('SuutQyY', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>window.addEventListener('closeModal', function () { var modal = document.getElementById('panggilAntrian'); if (modal) bootstrap.Modal.getOrCreateInstance(modal).hide(); });</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project Website\Samsat Online\resources\views/dashboard/antrian/bpkb.blade.php ENDPATH**/ ?>