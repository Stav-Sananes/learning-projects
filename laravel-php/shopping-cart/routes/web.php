<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});


Route::any('/{any}',function(){
    return view('app');
})->where('any', '.*');