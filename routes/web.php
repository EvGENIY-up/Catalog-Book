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
Route::get('/out', [App\Http\Controllers\UserController::class, 'authOut'])->name('user.out');
Route::post('/auth', [App\Http\Controllers\UserController::class, 'auth'])->name('user.auth');
Route::post('/registration', [App\Http\Controllers\UserController::class, 'registerAndAuth'])->name('user.create');
