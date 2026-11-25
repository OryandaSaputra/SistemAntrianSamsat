<?php $__env->startSection('title', 'Umpan Balik — SANRAS'); ?>
<?php $__env->startSection('content'); ?>
<div class="admin-page-header"><div><span class="admin-eyebrow">Insight · Suara masyarakat</span><h1>Umpan balik</h1><p>Tinjau masukan yang dikirimkan pengguna layanan.</p></div></div>
<?php if(session('success')): ?><div class="alert alert-success"><i class="bi bi-check-circle me-2"></i><?php echo e(session('success')); ?></div><?php endif; ?>
<section class="panel-card">
    <div class="panel-header"><div><h2>Pesan pengguna</h2><div class="small text-secondary"><?php echo e($feedbacks->total()); ?> masukan tersimpan</div></div><form method="GET" action="<?php echo e(route('dashboard.feedback.index')); ?>" class="d-flex gap-2"><label class="visually-hidden" for="feedbackSearch">Cari umpan balik</label><input id="feedbackSearch" type="search" name="search" value="<?php echo e($search); ?>" class="form-control form-control-sm" placeholder="Cari nama, email, pesan"><button class="btn btn-primary btn-sm" type="submit"><i class="bi bi-search"></i></button></form></div>
    <div class="table-wrap"><table class="table"><thead><tr><th>Pengirim</th><th>Email</th><th>Pesan</th><th>Dikirim</th><th>Aksi</th></tr></thead><tbody>
        <?php $__empty_1 = true; $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr><td class="fw-semibold"><?php echo e($feedback->name); ?></td><td><?php echo e($feedback->email); ?></td><td style="min-width:220px"><?php echo e(\Illuminate\Support\Str::limit($feedback->message, 100)); ?></td><td><?php echo e($feedback->created_at->format('d M Y, H:i')); ?></td><td><div class="d-flex gap-2"><button type="button" class="btn btn-sm btn-outline-primary feedback-detail" data-url="<?php echo e(route('dashboard.feedback.show', $feedback->id)); ?>" data-bs-toggle="modal" data-bs-target="#feedbackDetail"><i class="bi bi-eye me-1"></i>Detail</button><form action="<?php echo e(route('dashboard.feedback.destroy', $feedback->id)); ?>" method="POST" onsubmit="return confirm('Hapus masukan ini?')"><?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?><button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button></form></div></td></tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr><td colspan="5"><div class="empty-state"><i class="bi bi-chat-square-text"></i><strong class="d-block text-dark">Belum ada umpan balik</strong><span>Masukan yang dikirim pengguna akan tampil di sini.</span></div></td></tr>
        <?php endif; ?>
    </tbody></table></div>
    <div class="panel-body pt-0"><?php echo e($feedbacks->links()); ?></div>
</section>

<div class="modal fade" id="feedbackDetail" tabindex="-1" aria-labelledby="feedbackDetailLabel" aria-hidden="true"><div class="modal-dialog modal-dialog-centered"><div class="modal-content"><div class="modal-header"><h2 class="modal-title fs-5" id="feedbackDetailLabel">Detail umpan balik</h2><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button></div><div class="modal-body"><div class="mb-3"><div class="small text-secondary">Nama</div><strong id="detailName">—</strong></div><div class="mb-3"><div class="small text-secondary">Email</div><strong id="detailEmail">—</strong></div><div><div class="small text-secondary">Pesan</div><p id="detailMessage" class="mb-0" style="white-space:pre-wrap">—</p></div></div></div></div></div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    document.querySelectorAll('.feedback-detail').forEach(function (button) {
        button.addEventListener('click', async function () {
            const modal = document.getElementById('feedbackDetail');
            document.getElementById('detailName').textContent = 'Memuat...';
            document.getElementById('detailEmail').textContent = '—';
            document.getElementById('detailMessage').textContent = '—';
            try {
                const response = await fetch(button.dataset.url, { headers: { 'Accept': 'application/json' } });
                if (!response.ok) throw new Error('Tidak dapat memuat masukan.');
                const data = await response.json();
                document.getElementById('detailName').textContent = data.name;
                document.getElementById('detailEmail').textContent = data.email;
                document.getElementById('detailMessage').textContent = data.message;
            } catch (error) {
                document.getElementById('detailName').textContent = error.message;
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Project Website\Samsat Online\resources\views/dashboard/feedback/index.blade.php ENDPATH**/ ?>