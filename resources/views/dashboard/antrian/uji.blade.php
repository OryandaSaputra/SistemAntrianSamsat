@extends('dashboard.layouts.main')
@section('title', 'Antrean Uji Kendaraan — SANRAS')
@section('content')
<div class="admin-page-header"><div><span class="admin-eyebrow">Operasional · Antrean layanan</span><h1>Antrean Uji Kendaraan</h1><p>Kelola nomor yang masih menunggu untuk layanan Uji Kendaraan.</p></div><a href="{{ route('dashboard') }}" class="btn btn-outline-primary"><i class="bi bi-arrow-left me-2"></i>Ringkasan</a></div>
<livewire:dashboard.daftar-layanan.dashboard-antrian-uji />
@endsection
@section('script')
<script>window.addEventListener('closeModal', function () { var modal = document.getElementById('panggilAntrian'); if (modal) bootstrap.Modal.getOrCreateInstance(modal).hide(); });</script>
@endsection
