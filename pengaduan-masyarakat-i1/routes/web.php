<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportController;
use App\Models\Report;
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
/* Auth */

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::post('/login', [LoginController::class, 'auth']);

/* User */
Route::get('/', function () {
    return view('home', ['title' => 'Home']);
})->name('home');
Route::get('/search', [ReportController::class, 'search'])->name('search');
Route::get('/search/{report_id}', [ReportController::class, 'showReport']);

Route::post('/', [ReportController::class, 'store']);

/* Admin */
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [ReportController::class, 'index']);
    Route::get('/reports', [ReportController::class, 'showReports']);
    Route::get('/reports/{report_id}', [ReportController::class, 'showReport']);
    Route::get('/responses', [ReportController::class, 'showResponses']);

    Route::post('/reports/{report_id}', [ReportController::class, 'respond']);
});

/* 
CONTROLLERS
Auth:
#*_G /login
#*_P /login
#*
#*_G /logout

User:
#*_G /
#*_G /search
#*_G /search/{report_id}

Admin:
#*_G /admin
#*_G /admin/reports
#*_G /admin/reports/{report_id}
#*_P /admin/reports/{report_id}
#*_G /admin/responses

_ = route
* = view
# = controller
*/