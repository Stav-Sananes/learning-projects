<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/chat', function () {
        return view('chat/container');
    })->name('chat');
});

Route::middleware(['auth', 'sanctum'])->get('/chat/rooms',[ChatController::class,'rooms']);
Route::middleware(['auth', 'sanctum'])->get('/chat/rooms/{roomId}/messages',[ChatController::class,'messages']);
Route::middleware(['auth', 'sanctum'])->post('/chat/rooms/{roomId}/message',[ChatController::class,'newMessage']);

