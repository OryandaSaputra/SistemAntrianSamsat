@extends('layouts.app')
@section('title', 'Konfirmasi Kata Sandi — SANRAS')
@section('content')
<span class="section-kicker">Keamanan akun</span><h2>Konfirmasi kata sandi</h2><p class="muted mb-4">Masukkan kata sandi Anda sebelum melanjutkan.</p>
@if ($errors->any())<div class="alert alert-danger">{{ $errors->first() }}</div>@endif
<form method="POST" action="{{ route('password.confirm') }}" class="d-grid gap-3">@csrf
    <div><label for="password" class="form-label">Kata sandi</label><input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" autocomplete="current-password" required>@error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
    <button type="submit" class="btn btn-primary">Konfirmasi</button>
</form>
@endsection
