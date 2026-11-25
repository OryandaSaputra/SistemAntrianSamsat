<div>
    @if (session()->has('success'))<div class="alert alert-success"><i class="bi bi-check-circle me-2"></i>{{ session('success') }}</div>@endif
    <section class="panel-card">
        <div class="panel-header"><div><h2>Daftar antrean aktif</h2><div class="small text-secondary">{{ $serviceLabel }} · {{ now()->format('d M Y') }}</div></div><span class="status-pill pending"><i class="bi bi-hourglass-split"></i>{{ $queues->total() }} menunggu</span></div>
        <div class="table-wrap">
            <table class="table">
                <thead><tr><th>Nomor</th><th>Nama pemohon</th><th>Alamat</th><th>Nomor HP</th><th>Nomor KTP</th><th>Aksi</th></tr></thead>
                <tbody>
                    @forelse ($queues as $queue)
                        <tr wire:key="admin-queue-{{ $queue->id }}">
                            <td><strong class="text-primary">{{ $queue->no_antrian }}</strong></td>
                            <td class="fw-semibold">{{ $queue->nama }}</td>
                            <td style="min-width:180px">{{ $queue->alamat }}</td>
                            <td>{{ $queue->no_hp }}</td>
                            <td>{{ $queue->no_ktp }}</td>
                            <td><button class="btn btn-sm btn-primary" type="button" wire:click="panggilAntrian({{ $queue->id }})" data-bs-toggle="modal" data-bs-target="#panggilAntrian"><i class="bi bi-megaphone me-1"></i>Panggil</button></td>
                        </tr>
                    @empty
                        <tr><td colspan="6"><div class="empty-state"><i class="bi bi-check2-circle"></i><strong class="d-block text-dark">Tidak ada antrean menunggu</strong><span>Semua antrean {{ $serviceLabel }} hari ini sudah diproses.</span></div></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="panel-body pt-0">{{ $queues->links() }}</div>
    </section>
    @include('livewire.dashboard.daftar-layanan.panggilAntrian')
</div>
