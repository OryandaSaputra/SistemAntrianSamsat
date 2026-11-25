@extends('dashboard.layouts.main')
@section('title', 'Ringkasan Operasional — SANRAS')
@section('content')
<div class="admin-page-header">
    <div><span class="admin-eyebrow">Overview · {{ now()->translatedFormat('l, d F Y') }}</span><h1>Selamat datang, {{ auth()->user()->name }}</h1><p>Berikut ringkasan aktivitas antrean SAMSAT Riau.</p></div>
    <a href="{{ route('dashboard.laporan.index') }}" class="btn btn-outline-primary"><i class="bi bi-file-earmark-bar-graph me-2"></i>Lihat laporan</a>
</div>
<div class="row g-3 mb-4">
    <div class="col-6 col-xl-3"><div class="metric-card"><div class="metric-top"><span>Antrean hari ini</span><span class="metric-icon"><i class="bi bi-calendar-day"></i></span></div><strong class="metric-value">{{ number_format($hariIniAntri) }}</strong><div class="metric-foot">Nomor terbit pada hari ini</div></div></div>
    <div class="col-6 col-xl-3"><div class="metric-card"><div class="metric-top"><span>Minggu ini</span><span class="metric-icon"><i class="bi bi-calendar-week"></i></span></div><strong class="metric-value">{{ number_format($mingguIniAntri) }}</strong><div class="metric-foot">Akumulasi minggu berjalan</div></div></div>
    <div class="col-6 col-xl-3"><div class="metric-card"><div class="metric-top"><span>Bulan ini</span><span class="metric-icon"><i class="bi bi-calendar-month"></i></span></div><strong class="metric-value">{{ number_format($bulanIniAntri) }}</strong><div class="metric-foot">Akumulasi bulan berjalan</div></div></div>
    <div class="col-6 col-xl-3"><div class="metric-card"><div class="metric-top"><span>Total antrean</span><span class="metric-icon"><i class="bi bi-stack"></i></span></div><strong class="metric-value">{{ number_format($semuaAntri) }}</strong><div class="metric-foot">Seluruh data antrean</div></div></div>
</div>
<div class="d-flex align-items-center justify-content-between gap-3 mb-3"><div><span class="admin-eyebrow">Queue monitor</span><h2 class="h5 mb-0">Antrean menunggu per layanan</h2></div><span class="status-pill pending"><i class="bi bi-clock"></i> Hari ini</span></div>
<div class="row g-3">
    @foreach ([['label'=>'BPKB','value'=>$bpkb,'icon'=>'bi-car-front','url'=>route('dashboard.antrian.bpkb')],['label'=>'STNK','value'=>$stnk,'icon'=>'bi-card-checklist','url'=>route('dashboard.antrian.stnk')],['label'=>'Pajak kendaraan','value'=>$pajak,'icon'=>'bi-receipt','url'=>route('dashboard.antrian.pajak')],['label'=>'Uji kendaraan','value'=>$uji,'icon'=>'bi-clipboard2-check','url'=>route('dashboard.antrian.uji')]] as $service)
        <div class="col-sm-6 col-xl-3"><a href="{{ $service['url'] }}" class="text-reset"><div class="service-queue-card"><div class="d-flex align-items-center justify-content-between"><span class="fw-bold">{{ $service['label'] }}</span><span class="metric-icon"><i class="bi {{ $service['icon'] }}"></i></span></div><strong class="service-queue-value">{{ number_format($service['value']) }}</strong><p>Nomor menunggu untuk dipanggil</p><div class="text-primary small fw-bold mt-3">Buka daftar <i class="bi bi-arrow-up-right ms-1"></i></div></div></a></div>
    @endforeach
</div>
<div class="panel-card mt-4"><div class="panel-body d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3"><div><h3 class="h6 mb-1">Butuh rekap pelayanan?</h3><p class="small text-secondary mb-0">Buka laporan untuk menyaring antrean selesai dan mencetak rekap PDF.</p></div><a href="{{ route('dashboard.laporan.index') }}" class="btn btn-primary"><i class="bi bi-bar-chart-line me-2"></i>Buka laporan</a></div></div>
@endsection
