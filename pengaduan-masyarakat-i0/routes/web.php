<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ReportController::class, 'create'])->name('home');
Route::post('/', [ReportController::class, 'store']);

Route::get('/search', [ReportController::class, 'search'])->name('search');
Route::get('/search/{report_id}', [ReportController::class, 'showReport']);

Route::get('/login', [LoginController::class, 'index'])
    ->middleware('guest')
    ->name('login');
Route::post('/login', [LoginController::class, 'auth'])->middleware('guest');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', [ReportController::class, 'showStats'])->name('dashboard');

    Route::get('/reports', [ReportController::class, 'showReports'])->name(
        'reports'
    );

    Route::get('/reports/{report_id}', [ReportController::class, 'showReport']);
    Route::post('/reports/{report_id}', [ReportController::class, 'respond']);

    Route::get('/responses', [ReportController::class, 'showResponses'])->name(
        'responses'
    );
});

/* 
[v/] GET  /                     : home page
[v/] POST /                     : handle report input
    
[v/] GET  /search               : search page, handle search query
[v/] GET  /search/{report_id}   : show report details

[v/] GET  /login                : login page
[v/] POST /login                : handle login credentials and session
    
[v/] GET  /logout               : logout
    
[v/] GET  /admin                : dashboard page, contains statistc
[v/] GET  /admin/reports        : reports list page
[v/] GET  /admin/responses      : responses list page, only contains responses written by the admin

[v/] GET  /admin/reports/{id}   : page for sending or editing response
[v/] POST /admin/reports/{id}   : handle new response or response update
*/
