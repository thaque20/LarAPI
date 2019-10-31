<?php

use App\DataLog;
use App\Plant;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

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

Route::get('/input', function(){
    $data = array(
        'name',
        'scientific_name',
        'kingdom',
        'sub_kingdom',
        'super_division',
        'division',
        'phylum',
        'class',
        'sub_class',
        'order',
        'family',
        'genus',
        'species',
        'variety',
        'description'
    );
    $data_logs = array(
        'light',
        'temperature',
        'humidity',
        'soil',
        'moisture',
        'remarks',
        'alive'
    );
    $result = "";
//    $template = "\$datalog->$data[0] = \$request->$data[0];\n";
    foreach($data_logs as $d){
        $result .= "\$datalog->$d = \$request->$d;<br>";
//        $result .= $d . " ";
    }

    return $result;
});

Route::resource('/plant', 'PlantController');
Route::resource('/datalog', 'DataLogController');
Route::get('/plantlog/{id}', function ($id){
   $plantlog = Plant::find($id)->datalogs()->get();
   return response()->json($plantlog);
});

Route::get('/datamine', function(){
    $process = new Process(['python', asset('datamine.py')]);
    $process->run();
    if(!$process->isSuccessful()){
        throw new ProcessFailedException($process);
    }
    return $process->getOutput();
});

//Route::get('/logger', function(Request $request){
//    return $request;
//    $dataLog = new DataLog();
//
//    $dataLog->light = $request->light;
//    $dataLog->temperature = $request->temperature;
//    $dataLog->humidity = $request->humidity;
//    $dataLog->soil = $request->soil;
//    $dataLog->moisture = $request->moisture;
//    $dataLog->remarks = $request->remarks;
//
//    $dataLog->save();
//    $now = Carbon::now('Asia/Dhaka');
//    return $now->format("d/m h:i:s");
//
//});


//Route::get('/clock', function(Request $request){
//    $now = Carbon::now('Asia/Dhaka');
//    return $now->format("d/m h:i:s");
//});
//
//Route::get('/response', function(Request $request){
//    return $request;
//});
