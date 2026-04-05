<?php

use App\http\Controllers\AuthController;
use App\http\Controllers\BookController;
use App\http\Controllers\MyBookController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'ShowRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function (){
   Route::get('/my-books/create', [MyBookController::class, 'create'])->name('my-books.create');
   Route::post('/my-books/store', [MyBookController::class, 'store'])->name('my-books.store');
   Route::get('my-books/{myBook}/edit',[MyBookController::class, 'edit'])->name('my-books.edit');
   Route::put('my-books/(myBook)', [MyBookController::class, 'update'])->name('my-books.update');
   Route::delete('my-books/(myBook)',[MyBookController::class, 'destroy'])->name('my-books.destroy');
});

