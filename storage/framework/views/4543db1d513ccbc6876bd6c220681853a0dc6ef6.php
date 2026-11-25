<?php $__env->startSection('title', 'Laporan Antrean — SANRAS'); ?>
<?php $__env->startSection('content'); ?>
<div class="admin-page-header"><div><span class="admin-eyebrow">Insight · Rekap pelayanan</span><h1>Laporan antrean</h1><p>Telusuri antrean yang sudah dipanggil dan ekspor laporan sesuai filter.</p></div></div>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('dashboard.laporan.show-laporan', [])->html();
} elseif ($_instance->childHasBeenRendered('3ChbQvJ')) {
    $componentId = $_instance->getRenderedChildComponentId('3ChbQvJ');
    $componentTag = $_instance->getRenderedChildComponentTagName('3ChbQvJ');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('3ChbQvJ');
} else {
    $response = \Livewire\Livewire::mount('dashboard.laporan.show-laporan', []);
    $html = $response->html();
    $_instance->logRenderedChild('3ChbQvJ', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>window.addEventListener('closeReportDelete', function () { var modal = document.getElementById('deleteReportQueue'); if (modal) bootstrap.Modal.getOrCreateInstance(modal).hide(); });</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project Website\Samsat Online\resources\views/dashboard/laporan/index.blade.php ENDPATH**/ ?>