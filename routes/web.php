<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin/home', [AdminController::class, 'index'])
    ->name('admin.home')
    ->middleware('is_admin');

Route::get('admin/books', [BookController::class, 'index'])
    ->name('admin.books')
    ->middleware('is_admin');

Route::post('admin/books', [BookController::class, 'store'])
    ->name('admin.book.submit')
    ->middleware('is_admin');
Route::patch('admin/books/update', [BookController::class, 'update'])
    ->name('admin.book.update')
    ->middleware('is_admin');

Route::get('admin/ajaxadmin/dataBuku/{id}', [BookController::class, 'getDataBuku']);
Route::delete('admin/books/delete', [BookController::class, 'destroy'])
    ->name('admin.book.delete')
    ->middleware('is_admin');

//PENGELOLAAN BUKU
Route::post('admin/books', [AdminController::class, 'submit_book'])
    ->name('admin.book.submit')
    ->middleware('is_admin');

//UPDATE BOOK
Route::patch('admin/books/update', [AdminController::class, 'update_book'])
    ->name('admin.book.update')
    ->middleware('is_admin');

//PRINT PDF
Route::get('admin/print_books', [AdminController::class, 'print_books'])
    ->name('admin.print.books')
    ->middleware('is_admin');
