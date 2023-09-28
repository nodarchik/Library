<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Main route now leads to the books index
Route::get('/', [BookController::class, 'index'])->name('books.index');

// Resource routing for books (removes the need for individual route definitions)
Route::resource('books', BookController::class)->except('index')->names([
    'create' => 'books.create',
    'store' => 'books.store',
    'show' => 'books.show',
    'edit' => 'books.edit',
    'update' => 'books.update',
    'destroy' => 'books.destroy',
]);

// Resource routing for authors
Route::resource('authors', AuthorController::class)->names([
    'index' => 'authors.index',
    'create' => 'authors.create',
    'store' => 'authors.store',
    'show' => 'authors.show',
    'edit' => 'authors.edit',
    'update' => 'authors.update',
    'destroy' => 'authors.destroy',
]);
