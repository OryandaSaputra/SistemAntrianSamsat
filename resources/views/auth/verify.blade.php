@extends('layouts.app')
@section('title', 'Verifikasi Email — SANRAS')
@section('content')
<span class="section-kicker">Verifikasi akun</span><h2>Periksa email Anda</h2><p class="muted mb-4">Sebelum melanjutkan, buka email Anda dan ikuti tautan verifikasi yang kami kirimkan.</p>
@if (session('resent'))<div class="alert alert-success">Tautan verifikasi baru telah dikirim ke alamat email Anda.</div>@endif
@if ($errors->any())<div class="alert alert-danger">{{ $errors->first() }}</div>@endif
<form method="POST" action="{{ route('verification.resend') }}" class="d-grid gap-3">@csrf<button type="submit" class="btn btn-primary">Kirim ulang tautan verifikasi</button></form>
@endsection
