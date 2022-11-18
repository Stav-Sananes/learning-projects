<?php

use App\Models\Cars;
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
//Cars
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/bike', [App\Http\Controllers\HomeController::class, 'bike'])->name('bikes');
Route::get('/fivequestions', [App\Http\Controllers\HomeController::class, 'fivequestions'])->name('fivequestions');
Route::get('/fifteenquestions', [App\Http\Controllers\HomeController::class, 'fifteenquestions']);
Route::get('/finish', [App\Http\Controllers\CarsController::class, 'FindCars'])->name('finish');
Route::get('/finish_five', [App\Http\Controllers\CarsController::class, 'FindCarsForFive'])->name('finish_five');
Route::get('/search',[\App\Http\Controllers\CarsController::class,'search'])->name('search');
Route::get('/advanced_search',[\App\Http\Controllers\CarsController::class,'advanced_search'])->name('advanced_search');
Route::resource('cars', \App\Http\Controllers\CarsController::class);
//Bike
Route::get('/search/bike',[\App\Http\Controllers\BikeController::class,'search'])->name('searchBike');
Route::get('/advanced_search_bike',[\App\Http\Controllers\BikeController::class,'advanced_search_bike']);

Route::get('/bikesfinish', [App\Http\Controllers\BikeController::class, 'FindBikes'])->name('bikesfinish');
Route::resource('bikes', \App\Http\Controllers\BikeController::class);

//Google
Route::get('auth/google', [\App\Http\Controllers\Auth\GoogleLoginController::class, 'redirect'])->name('auth/google');
Route::get('/login/google/callback', [\App\Http\Controllers\Auth\GoogleLoginController::class, 'callback']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
