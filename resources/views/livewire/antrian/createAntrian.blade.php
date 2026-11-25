<div wire:ignore.self class="modal fade" id="createAntrian" tabindex="-1" aria-labelledby="createAntrianLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg"><div class="modal-content">
        <div class="modal-header"><div><h2 class="modal-title fs-5" id="createAntrianLabel">Ambil nomor antrean</h2><p class="small text-secondary mb-0">Lengkapi data untuk membuat tiket antrean.</p></div><button type="button" class="btn-close" data-bs-dismiss="modal" wire:click="close_modal" aria-label="Tutup"></button></div>
        <form wire:submit.prevent="save">
            <div class="modal-body"><div class="row g-3">
                <div class="col-md-6"><label for="queueName" class="form-label">Nama lengkap</label><input id="queueName" type="text" wire:model.defer="nama" class="form-control" maxlength="255" autocomplete="name">@error('nama')<small class="text-danger">{{ $message }}</small>@enderror</div>
                <div class="col-md-6"><label for="queuePhone" class="form-label">Nomor HP</label><input id="queuePhone" type="tel" wire:model.defer="no_hp" class="form-control" maxlength="20" autocomplete="tel">@error('no_hp')<small class="text-danger">{{ $message }}</small>@enderror</div>
                <div class="col-12"><label for="queueAddress" class="form-label">Alamat</label><textarea id="queueAddress" wire:model.defer="alamat" class="form-control" rows="2" maxlength="1000" autocomplete="street-address"></textarea>@error('alamat')<small class="text-danger">{{ $message }}</small>@enderror</div>
                <div class="col-md-6"><label for="queueKtp" class="form-label">Nomor KTP</label><input id="queueKtp" type="text" inputmode="numeric" wire:model.defer="no_ktp" class="form-control" maxlength="20" autocomplete="off">@error('no_ktp')<small class="text-danger">{{ $message }}</small>@enderror</div>
                <div class="col-md-6"><label for="queueService" class="form-label">Jenis layanan</label><select id="queueService" wire:model.defer="layanan" class="form-select"><option value="">Pilih layanan</option><option value="bpkb">Penerbitan BPKB</option><option value="pajak">Pajak kendaraan</option><option value="stnk">Penerbitan STNK</option><option value="uji">Uji kendaraan</option></select>@error('layanan')<small class="text-danger">{{ $message }}</small>@enderror</div>
                <div class="col-12"><div class="alert alert-info small mb-0"><i class="bi bi-info-circle me-2"></i>Nomor antrean dibuat otomatis oleh sistem berdasarkan layanan dan tanggal pengambilan.</div></div>
            </div></div>
            <div class="modal-footer"><button type="button" class="btn btn-light" data-bs-dismiss="modal" wire:click="close_modal">Batal</button><button type="submit" class="btn btn-primary" wire:loading.attr="disabled"><span wire:loading.remove wire:target="save">Buat antrean</span><span wire:loading wire:target="save">Memproses...</span></button></div>
        </form>
    </div></div>
</div>
