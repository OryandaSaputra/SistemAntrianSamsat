@extends('layouts.app')
@section('title', 'Reset Kata Sandi — SANRAS')
@section('content')
<span class="section-kicker">Pemulihan akun</span><h2>Atur ulang kata sandi</h2><p class="muted mb-4">Masukkan email yang terhubung dengan akun Anda. Kami akan mengirim tautan pemulihan jika tersedia.</p>
@if (session('status'))<div class="alert alert-success">{{ session('status') }}</div>@endif
@if ($errors->any())<div class="alert alert-danger">{{ $errors->first() }}</div>@endif
<form method="POST" action="{{ route('password.email') }}" class="d-grid gap-3">@csrf
    <div><label for="email" class="form-label">Alamat email</label><input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" autocomplete="email" required autofocus>@error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
    <button type="submit" class="btn btn-primary">Kirim tautan pemulihan</button>
</form>
<p class="text-center small mt-4 mb-0"><a href="{{ route('login') }}">Kembali ke halaman masuk</a></p>
@endsection
