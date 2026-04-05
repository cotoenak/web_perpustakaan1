<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MyBookController extends Controller
{
    public function index()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $books = $user->books()->latest()->paginate(10);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('my-books.create');
    }

    public function store(Request $request)
    {
         $request->validate([
            'title' => ['required', 'string', 'max:225'],
            'author' => ['required', 'string', 'max:225'],
            'description' => ['nullable', 'string'],
            'cover_image' => ['nullable', 'image', 'max:2048']
         ]);

         $coverPath = null;
         if($request->hasfile('cover_image')){
            $coverPath = $request->file('cover_image')->store('covers', 'public');
         }

         /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->books()->create([
            'title'=>$request->title,
            'author'=>$request->author,
            'description'=>$request->description,
            'cover_image'=>$coverPath
         ]);

         return redirect()->route('books.index')->with('succes', 'Buku berhasil ditambahkan');


    }
    
    public function edit(Book $myBook)
    {
        return view('my-books.edit', ['book' =>$myBook]);
    }

    public function update(Request $request, Book $myBook)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:225'],
            'author' => ['required', 'string', 'max:225'],
            'description' => ['nullable', 'string'],
            'cover_image' => ['nullable', 'image', 'max:2048']
         ]);

        $coverPath = $myBook->cover_image;
        if($request->hasFile('cover_image')){
            if($coverPath){
                Storage::disk('public')->delete($coverPath);
            }
            $coverPath = $request->file('cover_image')->store('covers', 'public');
        }

        $myBook->update([
            'title'=>$request->title,
            'author'=>$request->author,
            'description'=>$request->description,
            'cover_image'=>$coverPath
        ]);

        return redirect()->route('books.index')->with('succes', 'Buku berhasil diperbarui');
    }

    public function destroy(Book $myBook)
    {
        if($myBook->cover_image){
            Storage::disk('public')->delete($myBook->cover_image);
        }
        $myBook->delete();
        return redirect()->route('books.index')->with('succes', 'Buku berhasil dihapus!');
    }
}
