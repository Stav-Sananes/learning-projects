<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/fivequestions', [App\Http\Controllers\HomeController::class, 'fivequestions']);
Route::get('/fifteenquestions', [App\Http\Controllers\HomeController::class, 'fifteenquestions']);
Route::get('/finish', [App\Http\Controllers\CarsController::class, 'FindCars'])->name('finish');
Route::resource('cars', \App\Http\Controllers\CarsController::class);