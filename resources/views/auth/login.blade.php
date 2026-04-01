@extends('layouts.app')

@section('title', 'masuk')

@section('content')
<div class="auth-container">

    <div class="form-card w-full">

        <div class="auth-icon-warp">
            <div class="auth-icon">📚</div>
            <h2 class="form-title mb-0">Masuk ke Website Perpustakaan</h2>
            <p class="auth-subtitle">Selamat Datang Kembali!</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-error">⚠ {{$errors->first()}} </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="contoh@email.com" required>
                @error('email')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="......" required>
                @error('email')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="auth-remember">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Ingat Saya</label>
            </div>

            <button type="submit" class="btn btn-primary auth-btn">Masuk</button>
        </form>

        <div class="form-footer mt-1-5">
            Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a>
        </div>
    </div>
</div>
@endsection
