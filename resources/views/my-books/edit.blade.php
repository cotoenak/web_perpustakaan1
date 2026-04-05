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

            <form action="{{ route('my-books.update') }}" method="POST" enctype="multipart/form-data">
                @csrf @method('put')

                <div class="form-group">
                    <label for="title">Judul Buku</label>
                    <input type="text" name="title" id="title" value="{{ old('title'), $book->title }}"
                        placeholder="Masukkan Judul Buku" required>
                    @error('title')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="author">Pengarang</label>
                    <input type="text" name="author" id="author" value="{{ old('author'), $book->author}}"
                        placeholder="Masukkan Nama Pengarang" required>
                    @error('author')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" id="description" placeholder=""> {{ old('description'), $book->description }} </textarea>
                    @error('description')
                        <div class="form-error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="cover_image">Cover Buku Saat ini</label>
                    @if ($book->cover_image)
                    <div class="cover-preview=wrapper">
                        <img src="{{ storage::url($book->cover_image)}}" alt="cover" class="cover-preview">
                    </div>
                    @else
                        <div class="cover-empty">Tidak ada Cover saat ini</div>
                    @endif
                    <label for="cover_image">Ganti Cover</label>
                    <input type="file" name="cover_image" id="cover_image" accept="image/*" class='file input'>
                    <div class="form-hint">Kosongkan jika Tidak ingin Mengganti Cover.Maks, 2mb</div>
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
