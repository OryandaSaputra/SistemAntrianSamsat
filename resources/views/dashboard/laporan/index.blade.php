@extends('dashboard.layouts.main')
@section('title', 'Laporan Antrean — SANRAS')
@section('content')
<div class="admin-page-header"><div><span class="admin-eyebrow">Insight · Rekap pelayanan</span><h1>Laporan antrean</h1><p>Telusuri antrean yang sudah dipanggil dan ekspor laporan sesuai filter.</p></div></div>
<livewire:dashboard.laporan.show-laporan />
@endsection

@section('script')
<script>window.addEventListener('closeReportDelete', function () { var modal = document.getElementById('deleteReportQueue'); if (modal) bootstrap.Modal.getOrCreateInstance(modal).hide(); });</script>
@endsection
