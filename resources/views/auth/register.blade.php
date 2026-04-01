@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="auth-container">

    <div class="form-card w-full">

        <div class="auth-icon-warp">
            <div class="auth-icon">📚</div>
            <h2 class="form-title mb-0">Buat Akun Baru</h2>
            <p class="auth-subtitle">Gabung dan mulai mengelola buku favoritmu</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-error">⚠ {{$errors->first()}} </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="contoh@email.com" required>
                @error('email')
                    <div class="form-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="name" name="name" id="name" value="{{ old('email') }}" placeholder="Nama kamu" required>
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
            <div class="form-group">
                <label for="password_confirmation">Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Ulangi Password" required>
            </div>
            
            <button type="submit" class="btn btn-primary auth-btn">Masuk</button>
        </form>

        <div class="form-footer mt-1-5">
         Sudah punya akun? <a href="{{ route('login') }}">Login sekarang</a>
        </div>
    </div>
</div>
@endsection
