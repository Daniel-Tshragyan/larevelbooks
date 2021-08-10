<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/book', [\App\Http\Controllers\BookController::class, 'index'])->name('book');
Route::get('/changebook', [\App\Http\Controllers\BookController::class, 'show'])->name('changebook');
Route::put('/editBooks', [\App\Http\Controllers\BookController::class, 'update'])->name('editBooks');
Route::delete('/removebook', [\App\Http\Controllers\BookController::class, 'destroy'])->name('removebook');
Route::get('/addbook', [\App\Http\Controllers\AuthorController::class, 'show'])->name('addBook');
Route::post('/createBook', [\App\Http\Controllers\BookController::class, 'create'])->name('createBook');
Route::get('/author', [\App\Http\Controllers\AuthorController::class, 'index'])->name('author');
Route::put('/editAuthor', [\App\Http\Controllers\AuthorController::class, 'edit'])->name('editAuthor');
Route::get('/changeauthor', [\App\Http\Controllers\AuthorController::class, 'update'])->name('changeauthor');
Route::delete('/removeauthor', [\App\Http\Controllers\AuthorController::class, 'destroy'])->name('removeauthor');
Route::get('/addAutor', function () {
    return view('createAuthor');
})->name('addAutor');
Route::post('createAuthor', [\App\Http\Controllers\AuthorController::class, 'create'])->name('createAuthor');
