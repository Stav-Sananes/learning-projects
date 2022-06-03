<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Front\FoodCategoryController;
use App\Http\Controllers\Front\FoodMenuController;
use App\Http\Controllers\Front\FoodReservationController;
use App\Http\Controllers\Front\WelcomeController;
use Illuminate\Support\Facades\Route;



Route::get('/', [WelcomeController::class,'index']);
Route::get('/categories',[FoodCategoryController::class,'index'])->name('categories.index');
Route::get('/menus',[FoodMenuController::class,'index'])->name('menus.index');
Route::get('/categories/{category}',[FoodMenuController::class,'index'])->name('categories.show');
Route::get('/reservation/step-one',[FoodReservationController::class,'stepOne'])->name('reservations.step.one');
Route::post('/reservation/step-one',[FoodReservationController::class,'storestepOne'])->name('reservations.store.step.one');
Route::get('/reservation/step-two',[FoodReservationController::class,'stepTwo'])->name('reservations.step.two');
Route::post('/reservation/step-two',[FoodReservationController::class,'storestepTwo'])->name('reservations.store.step.two');
Route::get('/thanks',[WelcomeController::class,'thanks']);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::middleware(['auth','admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/',[AdminController::class,'index'])->name('index');
    Route::resource('/categories',CategoryController::class);
    Route::resource('/menus',MenuController::class);
    Route::resource('/tables',TableController::class);
    Route::resource('/reservations',ReservationController::class);
});
require __DIR__.'/auth.php';
