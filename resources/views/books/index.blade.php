@section('title', 'Beranda')

@section('content')
<div class="hero">
    <h1>Selamat Datang di Website Perpustkaan</h1>
    <p>Temukan Ribuan buku menarik. Baca, Plejari, dan jadika membaca sebagai kebiasaanmu!</p>
    <form action="{{ route('books.index') }}" class="hero-search" method="GET"">
        <input type="text" name="search" value="{{ $search }}" placeholder="Cari judul atau pengarang...">
        <button type="submit"></button>
    </form>
</div>

<div class="page-header-row">
    <div class="page-header">
        <h1>Koleksi Buku</h1>
        <p>{{$books->total()}} buku tersedia di Perpustakaan</p>
    </div>
    @auth
        <a href="#" class="btn btn-primary">+ Tambah Buku</a>
    @endauth
</div>

<div class="books-grid">
    @foreach ($books as $book)
        <div class="book-card">
            <a href="{{ route('books.show') }}"class="book-link">
                @if ($book->cover_image)
                    <img src=" {{ storage::url($book->cover_image) }}" alt="{{ $book->title }}" class="book-cover">
                @else
                <div class="book-cover-placeholder">
                    📖 <span>No Cover</span>
                </div>
                @endif
                <div class="book-info">
                    <div class="book-title">{{$book->title}}</div>
                    <div class="book-author">{{$book->author}} </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
@endsection