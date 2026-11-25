<div>
    <?php if(session()->has('success')): ?><div class="alert alert-success"><i class="bi bi-check-circle me-2"></i><?php echo e(session('success')); ?></div><?php endif; ?>
    <section class="panel-card">
        <div class="panel-header"><div><h2>Daftar antrean aktif</h2><div class="small text-secondary"><?php echo e($serviceLabel); ?> · <?php echo e(now()->format('d M Y')); ?></div></div><span class="status-pill pending"><i class="bi bi-hourglass-split"></i><?php echo e($queues->total()); ?> menunggu</span></div>
        <div class="table-wrap">
            <table class="table">
                <thead><tr><th>Nomor</th><th>Nama pemohon</th><th>Alamat</th><th>Nomor HP</th><th>Nomor KTP</th><th>Aksi</th></tr></thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $queues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $queue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr wire:key="admin-queue-<?php echo e($queue->id); ?>">
                            <td><strong class="text-primary"><?php echo e($queue->no_antrian); ?></strong></td>
                            <td class="fw-semibold"><?php echo e($queue->nama); ?></td>
                            <td style="min-width:180px"><?php echo e($queue->alamat); ?></td>
                            <td><?php echo e($queue->no_hp); ?></td>
                            <td><?php echo e($queue->no_ktp); ?></td>
                            <td><button class="btn btn-sm btn-primary" type="button" wire:click="panggilAntrian(<?php echo e($queue->id); ?>)" data-bs-toggle="modal" data-bs-target="#panggilAntrian"><i class="bi bi-megaphone me-1"></i>Panggil</button></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="6"><div class="empty-state"><i class="bi bi-check2-circle"></i><strong class="d-block text-dark">Tidak ada antrean menunggu</strong><span>Semua antrean <?php echo e($serviceLabel); ?> hari ini sudah diproses.</span></div></td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="panel-body pt-0"><?php echo e($queues->links()); ?></div>
    </section>
    <?php echo $__env->make('livewire.dashboard.daftar-layanan.panggilAntrian', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH D:\Project Website\Samsat Online\resources\views/livewire/dashboard/daftar-layanan/queue-table.blade.php ENDPATH**/ ?>