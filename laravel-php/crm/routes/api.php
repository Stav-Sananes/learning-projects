<?php

use App\Http\Resources\UpcomingResource;
use App\Models\Today;
use App\Models\Upcoming;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/upcoming', function () {
    $upcoming = Upcoming::all();
    return UpcomingResource::collection($upcoming);
});

Route::post('/upcoming', function (Request $request) {
    return Upcoming::create([
        'title' => $request->title,
        'task_id' => $request->task_id,
        'waiting' => $request->waiting,

    ]);
});

Route::delete('/upcoming/{task_id}',function($task_id){
    DB::table('upcomings')->where('task_id',$task_id)->delete();
    return 204;
});

Route::post('dailytask',function(Request $request){
    return Today::create([
        'id' => $request->id,
        'title'=>$request->title,
        'task_id'=>$request->task_id,

    ]);
});

Route::delete('dailytask/{task_id}',function($task_id){
    DB::table('todays')->where('task_id',$task_id)->delete();
    return 204;
});