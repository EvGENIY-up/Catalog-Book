<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/books', [App\Http\Controllers\HomeController::class, 'search'])->name('book.search');
Route::get('/book/{id}', [App\Http\Controllers\HomeController::class, 'getBook'])->name('book.index');
Route::post('/add', [App\Http\Controllers\HomeController::class, 'addBook'])->name('book.create');
Route::post('/update', [App\Http\Controllers\HomeController::class, 'updateBook'])->name('book.update');
Route::post('/delete', [App\Http\Controllers\HomeController::class, 'deleteBook'])->name('book.delete');
Route::get('/out', [App\Http\Controllers\UserController::class, 'authOut'])->name('user.out');
Route::post('/auth', [App\Http\Controllers\UserController::class, 'auth'])->name('user.auth');
Route::post('/registration', [App\Http\Controllers\UserController::class, 'registerAndAuth'])->name('user.create');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'adminPanel'])->name('admin');
Route::post('/admin/addAuthor', [App\Http\Controllers\AdminController::class, 'addAuthor'])->name('author.create');
Route::post('/admin/updateAuthor', [App\Http\Controllers\AdminController::class, 'updateAuthor'])->name('author.update');
