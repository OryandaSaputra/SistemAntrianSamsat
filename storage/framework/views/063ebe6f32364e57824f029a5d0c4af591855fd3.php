<div>
    <?php if(session()->has('success')): ?><div class="alert alert-success"><i class="bi bi-check-circle me-2"></i><?php echo e(session('success')); ?></div><?php endif; ?>
    <section class="panel-card">
        <div class="panel-header"><div><h2>Riwayat pelayanan selesai</h2><div class="small text-secondary">Filter laporan berdasarkan periode, layanan, atau nama pemohon.</div></div><span class="status-pill done"><i class="bi bi-check-circle"></i><?php echo e($laporan->total()); ?> data</span></div>
        <div class="panel-body">
            <div class="row g-2 align-items-end">
                <div class="col-md-3"><label for="reportPeriod" class="form-label">Periode</label><select id="reportPeriod" wire:model="tanggal_antrian" class="form-select"><option value="">Semua periode</option><option value="today">Hari ini</option><option value="week">Minggu ini</option><option value="month">Bulan ini</option></select></div>
                <div class="col-md-3"><label for="reportService" class="form-label">Layanan</label><select id="reportService" wire:model="layanan" class="form-select"><option value="">Semua layanan</option><option value="bpkb">BPKB</option><option value="stnk">STNK</option><option value="pajak">Pajak kendaraan</option><option value="uji">Uji kendaraan</option></select></div>
                <div class="col-md-4"><label for="reportSearch" class="form-label">Cari pemohon / nomor</label><input id="reportSearch" type="search" wire:model.debounce.400ms="search" class="form-control" placeholder="Nama atau nomor antrean"></div>
                <div class="col-md-2"><a href="<?php echo e(route('cetakLaporan', ['period' => $tanggal_antrian, 'layanan' => $layanan, 'search' => $search])); ?>" target="_blank" rel="noopener" class="btn btn-primary w-100"><i class="bi bi-file-earmark-pdf me-1"></i>Ekspor PDF</a></div>
            </div>
        </div>
        <div class="table-wrap">
            <table class="table">
                <thead><tr><th>Nomor</th><th>Nama</th><th>Alamat</th><th>Nomor HP</th><th>Nomor KTP</th><th>Layanan</th><th>Tanggal</th><th>Aksi</th></tr></thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $laporan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr wire:key="report-<?php echo e($item->id); ?>"><td><strong class="text-primary"><?php echo e($item->no_antrian); ?></strong></td><td><?php echo e($item->nama); ?></td><td><?php echo e($item->alamat); ?></td><td><?php echo e($item->no_hp); ?></td><td><?php echo e($item->no_ktp); ?></td><td><?php echo e(strtoupper($item->layanan)); ?></td><td><?php echo e(optional($item->tanggal_antrian)->format('d M Y')); ?></td><td><button type="button" class="btn btn-sm btn-outline-danger" wire:click="prepareDelete(<?php echo e($item->id); ?>)" data-bs-toggle="modal" data-bs-target="#deleteReportQueue"><i class="bi bi-trash"></i></button></td></tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="8"><div class="empty-state"><i class="bi bi-file-earmark-x"></i><strong class="d-block text-dark">Tidak ada data laporan</strong><span>Ubah filter atau rentang waktu pencarian.</span></div></td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="panel-body pt-0"><?php echo e($laporan->links()); ?></div>
    </section>

    <div wire:ignore.self class="modal fade" id="deleteReportQueue" tabindex="-1" aria-labelledby="deleteReportQueueLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"><div class="modal-content"><div class="modal-header"><h2 class="modal-title fs-5" id="deleteReportQueueLabel">Hapus data antrean?</h2><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button></div><form wire:submit.prevent="hapusAntrian"><div class="modal-body"><p class="mb-0">Data laporan yang dipilih akan dihapus secara permanen.</p></div><div class="modal-footer"><button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button><button type="submit" class="btn btn-danger" wire:loading.attr="disabled">Ya, hapus</button></div></form></div></div>
    </div>
</div>
<?php /**PATH D:\Project Website\Samsat Online\resources\views/livewire/dashboard/laporan/show-laporan.blade.php ENDPATH**/ ?>