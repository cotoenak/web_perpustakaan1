@extends('layouts.app')

@section('title', 'Tambah Buku')

@section('content')
    <div class="form-layout">
        <div class="mb-1-5">
            <a href="{{ route('books.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
        </div>

        <div class="form-card form-card-wide">
            <h2 class="form-title">➕ Tambah Buku Baru</h2>

            @if ($errors->any())
                <div class="alert alert-error">⚠️ {{ $errors->first() }}</div>
            @endif

            <form action="{{ route('my-books.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Judul Buku</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                        placeholder="Masukkan Judul Buku" required>
                    @error('title')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="author">Pengarang</label>
                    <input type="text" name="author" id="author" value="{{ old('author') }}"
                        placeholder="Masukkan Nama Pengarang" required>
                    @error('author')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" id="description" placeholder=""> {{ old('description') }} </textarea>
                    @error('description')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="cover_image">Cover Buku</label>
                    <input type="file" name="cover_image" id="cover_image" accept="image/*" class='file input'>
                    <div class="form-hint">Format JPG, webp, Maks, 2mb</div>
                    @error('cover_image')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>


                <div class="action-button-lg">
                    <button type="submit" class="btn btn-primary btn-flex-1">💾 Simpan Buku</button>
                    <a href="{{ route('books.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>

@endsection
