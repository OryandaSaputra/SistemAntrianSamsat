<div class="queue-dashboard">
    @php
    $serviceLabels = [
    'bpkb' => 'Penerbitan BPKB',
    'pajak' => 'Pajak Kendaraan',
    'stnk' => 'Penerbitan STNK',
    'uji' => 'Uji Kendaraan',
    ];

    $serviceIcons = [
    'bpkb' => 'bi-journal-text',
    'pajak' => 'bi-receipt',
    'stnk' => 'bi-card-text',
    'uji' => 'bi-car-front',
    ];
    @endphp

    {{-- Notifikasi berhasil --}}
    @if (session()->has('success'))
    <div class="alert queue-alert-success alert-dismissible fade show" role="alert">
        <div class="d-flex align-items-center gap-2">
            <i class="bi bi-check-circle-fill" aria-hidden="true"></i>
            <span>{{ session('success') }}</span>
        </div>
        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert"
            aria-label="Tutup notifikasi"></button>
    </div>
    @endif

    {{-- =====================================================
         ANTREAN MILIK PENGGUNA
    ====================================================== --}}
    @auth
    <section class="queue-panel queue-personal-panel mb-4" aria-labelledby="myQueueTitle">
        <div class="queue-panel-header">
            <div class="queue-panel-heading">
                <span class="queue-panel-icon">
                    <i class="bi bi-ticket-perforated" aria-hidden="true"></i>
                </span>

                <div>
                    <h2 id="myQueueTitle">Antrean saya</h2>
                    <p>Daftar tiket antrean yang terhubung dengan akun Anda.</p>
                </div>
            </div>

            <span class="queue-private-badge">
                <i class="bi bi-lock-fill" aria-hidden="true"></i>
                Data privat
            </span>
        </div>

        <div class="queue-panel-body">
            @if ($detailAntrian->isNotEmpty())
            <div class="queue-ticket-list">
                @foreach ($detailAntrian as $item)
                <article
                    class="queue-ticket-card {{ $item->is_call ? 'is-completed' : 'is-waiting' }}"
                    wire:key="my-queue-{{ $item->id }}">
                    <div class="queue-ticket-main">
                        <div class="queue-ticket-icon" aria-hidden="true">
                            <i class="bi {{ $serviceIcons[$item->layanan] ?? 'bi-ticket-perforated' }}"></i>
                        </div>

                        <div class="queue-ticket-content">
                            <div class="queue-ticket-topline">
                                <span class="queue-service-name">
                                    {{ $serviceLabels[$item->layanan] ?? strtoupper($item->layanan) }}
                                </span>

                                <span class="queue-ticket-date">
                                    <i class="bi bi-calendar3" aria-hidden="true"></i>
                                    {{ optional($item->tanggal_antrian)->format('d M Y') }}
                                </span>
                            </div>

                            <div class="queue-ticket-number-row">
                                <h3 class="queue-ticket-number">
                                    {{ $item->no_antrian }}
                                </h3>

                                @if ($item->is_call)
                                <span class="queue-status-badge is-done">
                                    <i class="bi bi-check-circle-fill" aria-hidden="true"></i>
                                    Selesai dipanggil
                                </span>
                                @else
                                <span class="queue-status-badge is-pending">
                                    <i class="bi bi-clock-fill" aria-hidden="true"></i>
                                    Menunggu dipanggil
                                </span>
                                @endif
                            </div>

                            <div class="queue-ticket-owner">
                                <span>
                                    <i class="bi bi-person" aria-hidden="true"></i>
                                    {{ $item->nama }}
                                </span>

                                <span>
                                    <i class="bi bi-person-vcard" aria-hidden="true"></i>
                                    KTP ••••{{ substr((string) $item->no_ktp, -4) }}
                                </span>
                            </div>
                        </div>
                    </div>

                    @if (!$item->is_call)
                    <div class="queue-ticket-actions">
                        <button
                            type="button"
                            class="btn queue-action-button queue-edit-button"
                            wire:click="editAntrian({{ $item->id }})"
                            data-bs-toggle="modal"
                            data-bs-target="#editAntrian"
                            aria-label="Edit antrean {{ $item->no_antrian }}">
                            <i class="bi bi-pencil-square" aria-hidden="true"></i>
                            <span>Edit</span>
                        </button>

                        <button
                            type="button"
                            class="btn queue-action-button queue-delete-button"
                            wire:click="deleteAntrian({{ $item->id }})"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteAntrian"
                            aria-label="Batalkan antrean {{ $item->no_antrian }}">
                            <i class="bi bi-trash3" aria-hidden="true"></i>
                            <span>Batalkan</span>
                        </button>
                    </div>
                    @endif
                </article>
                @endforeach
            </div>

            @if ($canPrintTicket)
            <div class="queue-ticket-footer">
                <div class="queue-ticket-footer-note">
                    <i class="bi bi-file-earmark-pdf" aria-hidden="true"></i>
                    <span>
                        Simpan atau cetak tiket antrean Anda untuk hari ini.
                    </span>
                </div>

                <a
                    class="btn queue-print-button"
                    href="{{ route('cetakAntrian') }}"
                    target="_blank"
                    rel="noopener">
                    <i class="bi bi-printer" aria-hidden="true"></i>
                    Cetak tiket hari ini
                </a>
            </div>
            @endif
            @else
            <div class="queue-empty-state">
                <div class="queue-empty-icon">
                    <i class="bi bi-ticket-perforated" aria-hidden="true"></i>
                </div>

                <h3>Belum ada antrean</h3>
                <p>
                    Anda belum memiliki tiket antrean.
                    Ambil antrean untuk memulai layanan.
                </p>

                <button
                    type="button"
                    class="btn btn-primary queue-empty-button"
                    data-bs-toggle="modal"
                    data-bs-target="#createAntrian">
                    <i class="bi bi-plus-lg me-2" aria-hidden="true"></i>
                    Ambil antrean sekarang
                </button>
            </div>
            @endif
        </div>
    </section>
    @endauth

    {{-- =====================================================
         DAFTAR ANTREAN PUBLIK
    ====================================================== --}}
    <section class="queue-panel queue-public-panel" aria-labelledby="publicQueueTitle">
        <div class="queue-panel-header queue-public-header">
            <div class="queue-panel-heading">
                <span class="queue-panel-icon public-icon">
                    <i class="bi bi-list-ol" aria-hidden="true"></i>
                </span>

                <div>
                    <h2 id="publicQueueTitle">Antrean yang menunggu</h2>
                    <p>
                        Daftar antrean aktif hari ini. Informasi pribadi tidak ditampilkan.
                    </p>
                </div>
            </div>

            <div class="queue-public-tools">
                <span class="queue-total-badge">
                    {{ $antrian->total() }} antrean
                </span>

                <div class="queue-filter">
                    <label for="queueFilter">
                        <i class="bi bi-funnel" aria-hidden="true"></i>
                        Filter layanan
                    </label>

                    <select
                        id="queueFilter"
                        class="form-select"
                        wire:model="filterLayanan">
                        <option value="">Semua layanan</option>
                        <option value="bpkb">Penerbitan BPKB</option>
                        <option value="pajak">Pajak kendaraan</option>
                        <option value="stnk">Penerbitan STNK</option>
                        <option value="uji">Uji kendaraan</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="queue-table-wrap">
            <table class="table queue-table">
                <thead>
                    <tr>
                        <th scope="col">Nomor antrean</th>
                        <th scope="col">Jenis layanan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($antrian as $item)
                    <tr wire:key="public-queue-{{ $item->id }}">
                        <td data-label="Nomor antrean">
                            <span class="queue-public-number">
                                {{ $item->no_antrian }}
                            </span>
                        </td>

                        <td data-label="Jenis layanan">
                            <span class="queue-public-service">
                                <i
                                    class="bi {{ $serviceIcons[$item->layanan] ?? 'bi-ticket-perforated' }}"
                                    aria-hidden="true"></i>
                                {{ $serviceLabels[$item->layanan] ?? strtoupper($item->layanan) }}
                            </span>
                        </td>

                        <td data-label="Tanggal">
                            <span class="queue-public-date">
                                {{ optional($item->tanggal_antrian)->format('d M Y') }}
                            </span>
                        </td>

                        <td data-label="Status">
                            <span class="queue-status-badge is-pending">
                                <i class="bi bi-clock-fill" aria-hidden="true"></i>
                                Menunggu
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="queue-empty-cell">
                            <div class="queue-empty-state queue-public-empty">
                                <div class="queue-empty-icon">
                                    <i class="bi bi-inbox" aria-hidden="true"></i>
                                </div>

                                <h3>Belum ada antrean aktif</h3>
                                <p>
                                    Belum ada antrean yang menunggu untuk layanan ini.
                                    Silakan periksa kembali nanti.
                                </p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($antrian->hasPages())
        <div class="queue-pagination">
            {{ $antrian->links() }}
        </div>
        @endif
    </section>

    {{-- Modal tetap menggunakan komponen Livewire existing --}}
    @auth
    @include('livewire.antrian.createAntrian')
    @include('livewire.antrian.editAntrian')
    @include('livewire.antrian.deleteAntrian')
    @endauth
</div>