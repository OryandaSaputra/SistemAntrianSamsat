<!doctype html>
<html lang="id">
<head><meta charset="utf-8"><title>Laporan Antrean SANRAS</title><style>body{font-family:DejaVu Sans,sans-serif;color:#1f2937;font-size:10px}h1{font-size:18px;text-align:center;margin-bottom:4px}p{color:#64748b;text-align:center;margin-top:0}table{width:100%;border-collapse:collapse;margin-top:20px}th,td{border:1px solid #dbe2ea;padding:7px;text-align:left}th{background:#f1f5f9}footer{margin-top:24px;text-align:right;color:#64748b;font-size:9px}</style></head>
<body>
    <h1>LAPORAN ANTREAN SAMSAT RIAU</h1><p>Dicetak <?php echo e(now()->format('d-m-Y H:i')); ?></p>
    <table><thead><tr><th>No.</th><th>Nomor antrean</th><th>Nama</th><th>Layanan</th><th>Tanggal</th><th>Status</th></tr></thead><tbody>
        <?php $__empty_1 = true; $__currentLoopData = $laporan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?><tr><td><?php echo e($loop->iteration); ?></td><td><?php echo e($item->no_antrian); ?></td><td><?php echo e($item->nama); ?></td><td><?php echo e(strtoupper($item->layanan)); ?></td><td><?php echo e(optional($item->tanggal_antrian)->format('d-m-Y')); ?></td><td><?php echo e($item->is_call ? 'Selesai' : 'Menunggu'); ?></td></tr><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?><tr><td colspan="6">Tidak ada data untuk filter ini.</td></tr><?php endif; ?>
    </tbody></table><footer>SANRAS · Sistem Antrean SAMSAT Riau</footer>
</body></html>
<?php /**PATH D:\Project Website\Samsat Online\resources\views/livewire/dashboard/laporan/cetakLaporan.blade.php ENDPATH**/ ?>