<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/edit', function () {
//     return view('edit');
// });
// routes/web.php
// routes/web.php

Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');

Route::get('/books/{book}/edit', function ($book) {
    return view('edit', ['bookId' => $book]);
})->name('books.edit');


