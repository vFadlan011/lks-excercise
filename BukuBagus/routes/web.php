<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UserController;
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

/* BOOK */

Route::get('/', [BookController::class, 'index'])
    ->middleware('auth')
    ->name('home');

Route::group(['prefix' => 'book', 'middleware' => 'auth'], function () {
    Route::get('/', function () {
        return redirect('/');
    });

    Route::get('/get-books', [BookController::class, 'getData']);

    Route::get('/create', [BookController::class, 'create'])
        ->middleware('auth')
        ->name('create');
    Route::post('/create', [BookController::class, 'store']);

    Route::get('/{book_id}', [BookController::class, 'showDetail'])
        ->middleware('auth')
        ->name('detail');

    /* RATING */
    Route::get('/{book_id}/rating', [RatingController::class, 'index'])
        ->middleware('auth')
        ->name('rating');
    Route::post('/{book_id}/rating', [RatingController::class, 'store']);

    /* REVIEW */
    Route::get('/{book_id}/review')
        ->middleware('auth')
        ->name('review');
    Route::post('/{book_id}/review');
});


/* AUTH */
Route::get('/register', [UserController::class, 'index'])
    ->middleware('guest')
    ->name('register');
Route::post('/register', [UserController::class, 'store'])->middleware('guest');

Route::get('/logout', [LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::get('/login', [LoginController::class, 'index'])
    ->middleware('guest')
    ->name('login');
Route::post('/login', [LoginController::class, 'auth']);
/* 

**Book**
GET  /

GET  /{book_id}

GET  /store
POST /store

POST /{book_id}/rating
POST /{book_id}/review
*/
