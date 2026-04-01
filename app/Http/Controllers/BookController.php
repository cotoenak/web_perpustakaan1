<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $search = $request ->input('search');
        $books = Book::when($search, function ($q) use ($search){
            $q->where('title', 'like', "%($search)%")->orWhere('author', 'like',"%($search)%");
        })->latest()->paginate(12);
        return view('books.index', compact('books', 'search'));
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }
}
