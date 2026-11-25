<div wire:ignore.self class="modal fade" id="panggilAntrian" tabindex="-1" aria-labelledby="panggilAntrianLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"><div class="modal-content">
        <div class="modal-header"><h2 class="modal-title fs-5" id="panggilAntrianLabel">Panggil nomor antrean</h2><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button></div>
        <form wire:submit.prevent="updatePanggilan"><div class="modal-body"><p class="mb-0">Konfirmasi bahwa pemohon pada nomor antrean ini telah dipanggil dan proses pelayanan selesai.</p></div><div class="modal-footer"><button type="button" class="btn btn-light" data-bs-dismiss="modal">Kembali</button><button type="submit" class="btn btn-primary" wire:loading.attr="disabled">Konfirmasi panggilan</button></div></form>
    </div></div>
</div>
