<div wire:ignore.self class="modal fade" id="deleteAntrian" tabindex="-1" aria-labelledby="deleteAntrianLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"><div class="modal-content">
        <div class="modal-header"><h2 class="modal-title fs-5" id="deleteAntrianLabel">Batalkan antrean?</h2><button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="close_modal" aria-label="Tutup"></button></div>
        <form wire:submit.prevent="destroy"><div class="modal-body"><p class="mb-0">Nomor antrean ini akan dibatalkan. Tindakan ini tidak dapat dibatalkan.</p></div><div class="modal-footer"><button type="button" class="btn btn-light" data-bs-dismiss="modal" wire:click="close_modal">Kembali</button><button type="submit" class="btn btn-danger" wire:loading.attr="disabled">Ya, batalkan</button></div></form>
    </div></div>
</div>
<?php /**PATH D:\Project Website\Samsat Online\resources\views/livewire/antrian/deleteAntrian.blade.php ENDPATH**/ ?>