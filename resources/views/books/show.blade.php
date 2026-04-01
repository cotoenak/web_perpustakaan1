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
                    📖 <span>No Cover</span>
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
        </div>
    </div>
@endsection