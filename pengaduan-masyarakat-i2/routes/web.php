<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportController;
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

Route::get('/', [ReportController::class, 'index'])->name('home');
Route::get('/search', [ReportController::class, 'search'])->name('search');
Route::get('/search/{report_id}', [ReportController::class, 'showReport']);

Route::post('/', [ReportController::class, 'store']);

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', [ReportController::class, 'dashboard']);
    Route::get('/reports', [ReportController::class, 'showReports']);
    Route::get('/reports/{report_id}', [ReportController::class, 'showReport']);
    Route::get('/responses', [ReportController::class, 'showResponses']);

    Route::post('/reports/{report_id}', [ReportController::class, 'respond']);
});

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::post('/login', [LoginController::class, 'auth'])->middleware('guest');
