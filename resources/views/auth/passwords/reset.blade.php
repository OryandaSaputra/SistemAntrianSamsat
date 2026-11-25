@extends('layouts.app')
@section('title', 'Buat Kata Sandi Baru — SANRAS')
@section('content')
<span class="section-kicker">Pemulihan akun</span><h2>Buat kata sandi baru</h2><p class="muted mb-4">Gunakan kata sandi kuat yang belum pernah digunakan pada akun lain.</p>
@if ($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
<form method="POST" action="{{ route('password.update') }}" class="d-grid gap-3">@csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <div><label for="email" class="form-label">Alamat email</label><input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" class="form-control @error('email') is-invalid @enderror" autocomplete="email" required>@error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
    <div><label for="password" class="form-label">Kata sandi baru</label><input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" autocomplete="new-password" required>@error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
    <div><label for="password_confirmation" class="form-label">Konfirmasi kata sandi</label><input id="password_confirmation" type="password" name="password_confirmation" class="form-control" autocomplete="new-password" required></div>
    <button type="submit" class="btn btn-primary">Simpan kata sandi baru</button>
</form>
@endsection
