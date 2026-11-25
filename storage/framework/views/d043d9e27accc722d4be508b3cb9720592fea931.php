<div wire:ignore.self class="modal fade" id="editAntrian" tabindex="-1" aria-labelledby="editAntrianLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"><div class="modal-content">
        <div class="modal-header"><h2 class="modal-title fs-5" id="editAntrianLabel">Perbarui data antrean</h2><button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="close_modal" aria-label="Tutup"></button></div>
        <form wire:submit.prevent="updateAntrian">
            <div class="modal-body">
                <div class="mb-3"><label for="editQueueName" class="form-label">Nama lengkap</label><input id="editQueueName" type="text" wire:model.defer="nama" class="form-control" maxlength="255"><?php $__errorArgs = ['nama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><small class="text-danger"><?php echo e($message); ?></small><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                <div class="mb-3"><label for="editQueueAddress" class="form-label">Alamat</label><textarea id="editQueueAddress" wire:model.defer="alamat" class="form-control" rows="2" maxlength="1000"></textarea><?php $__errorArgs = ['alamat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><small class="text-danger"><?php echo e($message); ?></small><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                <div class="mb-3"><label for="editQueuePhone" class="form-label">Nomor HP</label><input id="editQueuePhone" type="tel" wire:model.defer="no_hp" class="form-control" maxlength="20"><?php $__errorArgs = ['no_hp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><small class="text-danger"><?php echo e($message); ?></small><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                <div><label for="editQueueKtp" class="form-label">Nomor KTP</label><input id="editQueueKtp" type="text" inputmode="numeric" wire:model.defer="no_ktp" class="form-control" maxlength="20"><?php $__errorArgs = ['no_ktp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><small class="text-danger"><?php echo e($message); ?></small><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                <div class="mt-3"><label for="editQueueService" class="form-label">Jenis layanan</label><select id="editQueueService" wire:model.defer="layanan" class="form-select"><option value="bpkb">Penerbitan BPKB</option><option value="pajak">Pajak kendaraan</option><option value="stnk">Penerbitan STNK</option><option value="uji">Uji kendaraan</option></select><?php $__errorArgs = ['layanan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><small class="text-danger"><?php echo e($message); ?></small><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                <p class="small text-secondary mt-3 mb-0">Jika layanan diubah, sistem akan menerbitkan nomor antrean baru pada layanan tujuan.</p>
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-light" data-bs-dismiss="modal" wire:click="close_modal">Batal</button><button type="submit" class="btn btn-primary" wire:loading.attr="disabled">Simpan perubahan</button></div>
        </form>
    </div></div>
</div>
<?php /**PATH D:\Project Website\Samsat Online\resources\views/livewire/antrian/editAntrian.blade.php ENDPATH**/ ?>