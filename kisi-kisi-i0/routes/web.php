<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*_________________________________________________________________________.
|--------------------------------------------------------------------------|
| Web Routes                                                               |
|--------------------------------------------------------------------------|
|                                                                          |
| Here is where you can register web routes for your application. These    |
| routes are loaded by the RouteServiceProvider and all of them will       |
| be assigned to the "web" middleware group. Make something great!         |
|--------------------------------------------------------------------------|
 \_______________________________________________________________________*/

Route::get('/', function () {
    return view('welcome', [
        'title' => 'Home | LokerNet'
    ]);
});

Route::group(['prefix' => 'profile', 'middleware' => ['auth']], function () {
    Route::get('/', [UserController::class, 'index']); // myProfile
    Route::get('/edit'); // edit
    Route::get('/{user_id}')->middleware('admin'); // showProfile

    Route::post('/edit'); // update
});

Route::get('/search', [VacancyController::class, 'search']); // search

Route::group(['prefix' => 'company'], function () {
    Route::get('/', [CompanyController::class, 'showCompanies']); // showCompanies
    Route::get('/{company_id}', [CompanyController::class, 'showCompany']); // showCompany
});

Route::group(['prefix' => 'vacancy'], function () {
    Route::get('/', [VacancyController::class, 'showVacancies']); // showVacancies
    Route::get('/{vacancy_id}'); // showVacancy

    Route::post('/{vacancy_id}/apply')->middleware('auth'); // apply
});

Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'auth']], function () {
    Route::get('/', function () {
        return view('admin.dashboard', [
            'title' => 'Dashboard'
        ]);
    }); // dashboard

    Route::group(['prefix' => 'company'], function () {
        Route::get('/', [CompanyController::class, 'showCompanies']); // showCompanies

        Route::get('/add', [CompanyController::class, 'create']); // create
        Route::get('/{company_id}/edit'); // edit
        Route::get('/{company_id}/delete'); // delete

        Route::post('/add', [CompanyController::class, 'store']); // store

        Route::get('/{company_id}', [CompanyController::class, 'showCompany']); // showCompany
        Route::post('/{company_id}/edit'); // update
    });

    Route::group(['prefix' => 'vacancy'], function () {
        Route::get('/'); // showVacancies
        Route::get('/{vacancy_id}'); // showVacancy

        Route::get('/add'); // create
        Route::get('/{vacancy_id}/edit'); // edit
        Route::get('/{vacancy_id}/delete'); // delete

        Route::post('/add'); // store
        Route::post('/{vacancy_id}/edit'); // update
    });
});

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

Route::post('/login', [LoginController::class, 'auth'])->middleware('guest');
Route::post('/register', [UserController::class, 'store'])->middleware('guest');
