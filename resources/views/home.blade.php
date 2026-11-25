@extends('layouts.main')

@section('title', 'E-Riau SAMSAT | Sistem Antrean Online')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/landing-original.css') }}">
@endpush

@section('content')
<div class="landing-page">
    @php
    $serviceDetails = [
    'detailPajak' => [
    'title' => 'Bayar Pajak Kendaraan Bermotor',
    'card_title' => 'Bayar Pajak',
    'icon' => 'bi-cash-coin',
    'description' => 'Pembayaran pajak kendaraan bermotor sesuai dengan ketentuan yang berlaku.',
    'image' => 'pajak.png',
    'items' => [
    'KTP asli dan fotokopi pemilik kendaraan.',
    'STNK asli dan fotokopi.',
    'BPKB asli dan fotokopi (jika diminta).',
    'Formulir permohonan pembayaran pajak yang telah diisi.',
    'Bukti pembayaran terakhir pajak kendaraan bermotor.',
    'Kwitansi pembelian jika kendaraan baru untuk pembayaran pajak pertama kali.',
    ],
    ],
    'detailStnk' => [
    'title' => 'Persyaratan Penerbitan STNK',
    'card_title' => 'Penerbitan STNK',
    'icon' => 'bi-card-text',
    'description' => 'Pengurusan Surat Tanda Nomor Kendaraan sebagai dokumen identitas dan legalitas kendaraan.',
    'image' => 'stnk.png',
    'items' => [
    'KTP asli dan fotokopi pemilik kendaraan.',
    'BPKB asli dan fotokopi.',
    'Faktur pembelian kendaraan.',
    'Bukti pembayaran pajak kendaraan bermotor.',
    'Surat keterangan dari dealer untuk kendaraan baru.',
    'Formulir permohonan penerbitan STNK yang telah diisi.',
    ],
    ],
    'detailBpkb' => [
    'title' => 'Persyaratan Penerbitan BPKB',
    'card_title' => 'Penerbitan BPKB',
    'icon' => 'bi-journal-text',
    'description' => 'Pengurusan Buku Pemilik Kendaraan Bermotor sebagai bukti kepemilikan kendaraan.',
    'image' => 'bpkb.png',
    'items' => [
    'KTP asli dan fotokopi pemilik kendaraan.',
    'Faktur pembelian kendaraan.',
    'Bukti pembayaran pajak kendaraan bermotor.',
    'Surat keterangan dari dealer untuk kendaraan baru.',
    'Formulir permohonan penerbitan BPKB yang telah diisi.',
    ],
    ],
    'detailUji' => [
    'title' => 'Persyaratan Pengecekan Kendaraan',
    'card_title' => 'Pengecekan Kendaraan',
    'icon' => 'bi-car-front',
    'description' => 'Pemeriksaan kendaraan untuk membantu memastikan kondisi dan kelengkapan kendaraan.',
    'image' => 'uji.png',
    'items' => [
    'KTP asli dan fotokopi pemilik kendaraan.',
    'STNK asli dan fotokopi.',
    'Bukti pembayaran pajak kendaraan bermotor.',
    'Formulir permohonan pengecekan kendaraan yang telah diisi.',
    'Bukti asuransi kendaraan jika ada.',
    ],
    ],
    ];
    @endphp

    {{-- HERO --}}
    <section id="hero" class="landing-hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xl-7">
                    <span class="hero-kicker">
                        <i class="bi bi-people-fill me-2" aria-hidden="true"></i>
                        Sistem Antrean Online SAMSAT Riau
                    </span>

                    <h1>
                        Selamat Datang
                        <span>E-Riau SAMSAT</span>
                    </h1>

                    <p class="hero-description">
                        Selamat datang di layanan antrean online SAMSAT Riau.
                        Ambil nomor antrean sesuai jenis pelayanan yang Anda butuhkan
                        dengan lebih mudah dan teratur.
                    </p>

                    <div class="hero-actions">
                        <a href="{{ route('antrian.index') }}" class="btn-get-started">
                            Ambil Antrean
                            <i class="bi bi-arrow-right ms-2" aria-hidden="true"></i>
                        </a>
                        <a href="#layanan" class="btn-hero-secondary">
                            Lihat Layanan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main id="main">
        {{-- PENGANTAR DAN DAFTAR LAYANAN --}}
        <section id="why-us" class="why-us">
            <div class="container">
                <div class="row g-4 align-items-stretch">
                    <div class="col-lg-4">
                        <div class="content h-100">
                            <span class="content-kicker">Pelayanan digital</span>
                            <h2>Sistem Antrean Online</h2>
                            <p>
                                Sistem Antrean Online SAMSAT Riau membantu pengunjung
                                mengambil nomor antrean sesuai pelayanan yang dibutuhkan.
                                Pilih layanan dan lihat persyaratannya sebelum datang.
                            </p>
                            <a href="{{ route('antrian.index') }}" class="more-btn">
                                Ambil Antrean
                                <i class="bi bi-chevron-right ms-1" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="service-overview h-100">
                            <div class="row align-items-center g-3">
                                <div class="col-md-7">
                                    <span class="overview-kicker">E-Riau SAMSAT</span>
                                    <h2>Berbagai layanan dalam satu sistem</h2>
                                    <p>
                                        Pilih jenis pelayanan kendaraan bermotor yang sesuai
                                        dengan kebutuhan Anda. Informasi persyaratan tersedia
                                        pada setiap kartu layanan.
                                    </p>
                                    <div class="service-chips">
                                        <span><i class="bi bi-check-circle-fill" aria-hidden="true"></i> Pajak</span>
                                        <span><i class="bi bi-check-circle-fill" aria-hidden="true"></i> STNK</span>
                                        <span><i class="bi bi-check-circle-fill" aria-hidden="true"></i> BPKB</span>
                                        <span><i class="bi bi-check-circle-fill" aria-hidden="true"></i> Uji Kendaraan</span>
                                    </div>
                                </div>
                                <div class="col-md-5 text-center">
                                    <img
                                        src="{{ asset('assets/img/signal-samsat.png') }}"
                                        alt="Ilustrasi layanan SIGNAL SAMSAT Digital Nasional"
                                        class="signal-image img-fluid"
                                        loading="lazy"
                                        decoding="async">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="layanan" class="section-title service-section-title">
                    <h2>Jenis Pelayanan</h2>
                    <p>Pilih layanan untuk melihat informasi dan persyaratan yang diperlukan.</p>
                </div>

                <div class="row g-4">
                    @foreach ($serviceDetails as $modalId => $detail)
                    <div class="col-sm-6 col-xl-3 d-flex">
                        <article class="icon-box w-100">
                            <div class="service-icon" aria-hidden="true">
                                <i class="bi {{ $detail['icon'] }}"></i>
                            </div>

                            <h3>{{ $detail['card_title'] }}</h3>
                            <p>{{ $detail['description'] }}</p>

                            <button
                                class="btn btn-primary service-detail-button mt-auto"
                                type="button"
                                data-bs-toggle="modal"
                                data-bs-target="#{{ $modalId }}"
                                aria-label="Lihat persyaratan {{ $detail['card_title'] }}">
                                Tampilkan Detail
                                <i class="bi bi-arrow-right ms-1" aria-hidden="true"></i>
                            </button>
                        </article>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <div class="container">
            <div class="fancy-line" aria-hidden="true"></div>
        </div>

        {{-- PANDUAN --}}
        <section id="panduan" class="panduan-section">
            <div class="container">
                <div class="section-title">
                    <h2>Panduan Menggunakan Sistem</h2>
                    <p>Ikuti panduan berikut untuk menggunakan sistem antrean online.</p>
                </div>

                <div class="guide-image-wrap">
                    <img
                        src="{{ asset('assets/img/panduan.png') }}"
                        alt="Panduan langkah-langkah menggunakan sistem antrean online E-Riau SAMSAT"
                        class="img-fluid guide-image"
                        loading="lazy"
                        decoding="async">
                </div>
            </div>
        </section>

        <div class="container">
            <div class="fancy-line" aria-hidden="true"></div>
        </div>

        {{-- UMPAN BALIK --}}
        <section id="feedback" class="feedback-section">
            <div class="container">
                <div class="section-title">
                    <h2>Umpan Balik Pengguna</h2>
                    <p>
                        Pendapat Anda membantu kami berkembang.
                        Bagikan pengalaman dan saran Anda.
                    </p>
                </div>

                <div class="row g-4 align-items-center">
                    <div class="col-lg-4">
                        <div class="feedback-info-card">
                            <img
                                src="{{ asset('assets/img/icon.png') }}"
                                alt="Ilustrasi layanan umpan balik"
                                class="feedback-illustration img-fluid"
                                loading="lazy"
                                decoding="async">

                            <div class="info-item">
                                <i class="bi bi-geo-alt" aria-hidden="true"></i>
                                <div>
                                    <h3>Lokasi</h3>
                                    <p>Pekanbaru, Indonesia</p>
                                </div>
                            </div>

                            <div class="info-item">
                                <i class="bi bi-envelope" aria-hidden="true"></i>
                                <div>
                                    <h3>Email</h3>
                                    <p><a href="mailto:SamsatRiau@gmail.com">SamsatRiau@gmail.com</a></p>
                                </div>
                            </div>

                            <div class="info-item">
                                <i class="bi bi-telephone" aria-hidden="true"></i>
                                <div>
                                    <h3>No. Telepon</h3>
                                    <p><a href="tel:+6281234567899">+62 81234567899</a></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="feedback-form-card">
                            @auth
                            <h3>Sampaikan Umpan Balik</h3>
                            <p class="feedback-form-intro">
                                Silakan isi formulir berikut untuk mengirimkan masukan.
                            </p>

                            <form
                                id="feedbackForm"
                                action="{{ route('feedback.store') }}"
                                method="POST">
                                @csrf

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="feedbackName" class="form-label">Nama Anda</label>
                                        <input
                                            type="text"
                                            name="name"
                                            id="feedbackName"
                                            class="form-control"
                                            value="{{ old('name', auth()->user()->name) }}"
                                            maxlength="255"
                                            autocomplete="name"
                                            required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="feedbackEmail" class="form-label">Email Anda</label>
                                        <input
                                            type="email"
                                            name="email"
                                            id="feedbackEmail"
                                            class="form-control"
                                            value="{{ old('email', auth()->user()->email) }}"
                                            maxlength="255"
                                            autocomplete="email"
                                            required>
                                    </div>

                                    <div class="col-12">
                                        <label for="feedbackMessage" class="form-label">Umpan Balik Anda</label>
                                        <textarea
                                            name="message"
                                            id="feedbackMessage"
                                            class="form-control"
                                            rows="6"
                                            maxlength="5000"
                                            placeholder="Tuliskan pendapat atau saran Anda..."
                                            required></textarea>
                                    </div>

                                    <div class="col-12 d-flex flex-wrap align-items-center gap-3">
                                        <button
                                            type="submit"
                                            id="feedbackSubmit"
                                            class="btn btn-primary feedback-submit">
                                            <i class="bi bi-send me-2" aria-hidden="true"></i>
                                            <span>Kirim Pesan</span>
                                        </button>

                                        <span
                                            id="feedbackStatus"
                                            class="feedback-status"
                                            role="status"
                                            aria-live="polite"></span>
                                    </div>
                                </div>
                            </form>
                            @else
                            <div class="feedback-login-notice">
                                <div>
                                    <h3>Masuk untuk mengirim umpan balik</h3>
                                    <p>
                                        Silakan masuk ke akun Anda terlebih dahulu
                                        agar dapat mengirimkan masukan.
                                    </p>
                                </div>
                                <a href="{{ route('login') }}" class="btn btn-primary">
                                    Masuk
                                    <i class="bi bi-box-arrow-in-right ms-1" aria-hidden="true"></i>
                                </a>
                            </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    {{-- MODAL PERSYARATAN LAYANAN --}}
    @foreach ($serviceDetails as $modalId => $detail)
    <div
        class="modal fade service-modal"
        id="{{ $modalId }}"
        tabindex="-1"
        aria-labelledby="{{ $modalId }}Label"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="{{ $modalId }}Label">
                        {{ $detail['title'] }}
                    </h2>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Tutup"></button>
                </div>

                <div class="modal-body">
                    <img
                        src="{{ asset('assets/img/' . $detail['image']) }}"
                        alt="Ilustrasi {{ $detail['card_title'] }}"
                        class="service-modal-image"
                        loading="lazy"
                        decoding="async">

                    <p class="service-modal-note">
                        Persyaratan berikut merupakan panduan umum.
                        Pastikan kembali ketentuan resmi sebelum datang ke kantor layanan.
                    </p>

                    <ol class="service-requirements">
                        @foreach ($detail['items'] as $item)
                        <li>{{ $item }}</li>
                        @endforeach
                    </ol>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Tutup
                    </button>
                    <a href="{{ route('antrian.index') }}" class="btn btn-primary">
                        Ambil Antrean
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const feedbackForm = document.getElementById('feedbackForm');

        if (!feedbackForm) {
            return;
        }

        const submitButton = document.getElementById('feedbackSubmit');
        const buttonLabel = submitButton ? submitButton.querySelector('span') : null;
        const statusElement = document.getElementById('feedbackStatus');
        const originalButtonLabel = buttonLabel ? buttonLabel.textContent : 'Kirim Pesan';

        feedbackForm.addEventListener('submit', async function(event) {
            event.preventDefault();

            if (submitButton) {
                submitButton.disabled = true;
            }

            if (buttonLabel) {
                buttonLabel.textContent = 'Mengirim...';
            }

            statusElement.textContent = 'Sedang mengirim umpan balik...';
            statusElement.classList.remove('text-danger', 'text-success');

            try {
                const response = await fetch(feedbackForm.action, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: new FormData(feedbackForm),
                    credentials: 'same-origin'
                });

                const result = await response.json().catch(function() {
                    return {};
                });

                if (!response.ok) {
                    const validationErrors = result.errors ?
                        Object.values(result.errors).flat() :
                        [];

                    throw new Error(
                        validationErrors[0] ||
                        result.message ||
                        'Umpan balik belum dapat dikirim. Silakan coba kembali.'
                    );
                }

                statusElement.textContent = result.message || 'Terima kasih. Umpan balik Anda berhasil dikirim.';
                statusElement.classList.add('text-success');

                const messageField = feedbackForm.querySelector('textarea[name="message"]');

                if (messageField) {
                    messageField.value = '';
                }
            } catch (error) {
                statusElement.textContent = error.message || 'Terjadi kesalahan. Silakan coba kembali.';
                statusElement.classList.add('text-danger');
            } finally {
                if (submitButton) {
                    submitButton.disabled = false;
                }

                if (buttonLabel) {
                    buttonLabel.textContent = originalButtonLabel;
                }
            }
        });
    });
</script>
@endsection