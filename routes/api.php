<?php

use App\DataLog;
use Illuminate\Http\Request;
use Carbon\Carbon;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/logs', function(){
    return DataLog::all();
});

Route::get('/logger', function(Request $request){
    $dataLog = new DataLog();

    $dataLog->light = $request->light;
    $dataLog->temperature = $request->temperature;
    $dataLog->humidity = $request->humidity;
    $dataLog->soil = $request->soil;
    $dataLog->moisture = $request->moisture;
    $dataLog->remarks = $request->remarks;

    $dataLog->save();
    $now = Carbon::now('Asia/Dhaka');
    return $now->format("d/m h:i:s");

});


Route::get('/clock', function(Request $request){
    $now = Carbon::now('Asia/Dhaka');
    return $now->format("d/m h:i:s");
});

Route::get('/response', function(Request $request){
    return $request;
});