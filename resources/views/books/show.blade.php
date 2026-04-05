@extends('layout.app')

@section('title', $book->title)

@section('content')
    <div class="mb-1-5">
        <a href="{{ route('books.index') }}" class="btn btn-secondary btn-sm">⬅ Kembali</a>
    </div>

    <div class="book-detail">
        <div class="">
            @if ($book->cover_image)
                <img src=" {{ storage::url($book->cover_image) }}" alt="{{ $book->title }}" class="detail-cover">
            @else
                <div class="deatil-cover-placeholder">
                    📖
                </div>
            @endif
        </div>

        <div class="detail-info">
            <h1>{{$book->title}}</h1>
            <div class="detail-author">Oleh {{$book->}}</div>

            @if ($book->description)
                <div class="detail-desc"> {{$book->description}}</div>
            @else
                <div class="detail-desc empty-state-text">Tidak ada deskripsi untu buku ini.</div>
            @endif

            <div class="detail-uploder">
                Ditambahkan Oleh <strong>{{$book->user->name}} </strong>
            </div>

            @auth
                @if ($book->user_id === Auth::id())
                    <div class="action-button-lg">
                        <a href="{{ route('my-books.edit', $book) }}" class="btn btn-secondary">🖊 Edit</a>
                        <form action="{{ route('my-books.destroy', $book) }}" method="POST" onsubmit="return confirm('Yakin ingin Hapus ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger">🗑 Hapus</button>
                        </form>
                    </div>
                @endif
            @endauth
        </div>
    </div>
@endsection