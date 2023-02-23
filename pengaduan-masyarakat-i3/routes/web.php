<?php

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

Route::get('/');
Route::get('/search');
Route::get('/search/{report_uuid}');
Route::post('/');

Route::get('/admin');
Route::get('/admin/{report_uuid}');

Route::post('/admin/{report_uuid}');

Route::get('/login');
Route::get('/logout');

Route::post('/login');
