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

Route::get('/datamine/{id}', function($id){
    $data = Plant::find($id)->datalogs()->get();
    $data_filter = [];

    foreach($data as $d){
        if($d['alive'] == '1' || $d['alive'] == 'true' || $d['alive']){
            $d['light'] = (double) $d['light'];
            $d['temperature'] = (double) $d['temperature'];
            $d['humidity'] = (double) $d['humidity'];
            $d['moisture'] = (double) $d['moisture'];
            if($d['soil'] == 'Dry'){
                $d['soil'] = 0;
            } else if($d['soil'] == 'Wet'){
                $d['soil'] = 1;
            } else if($d['soil'] == 'Very Wet'){
                $d['soil'] = 2;
            }
            array_push($data_filter, $d);
        }
    }
    $data = [
        'light' => [0,0],
        'temperature' => [10000,0],
        'humidity' => [10000,0],
        'soil' => [10000,0],
        'moisture' => [10000,0]
    ];

    $light = array_column($data_filter, 'light');
    $data['light'][0] = min($light);
    $data['light'][1] = max($light);

    $temperature = array_column($data_filter, 'temperature');
    $data['temperature'][0] = min($temperature);
    $data['temperature'][1] = max($temperature);

    $humidity = array_column($data_filter, 'humidity');
    $data['humidity'][0] = min($humidity);
    $data['humidity'][1] = max($humidity);

    $soil = array_column($data_filter, 'soil');
    $data['soil'][0] = min($soil);
    $data['soil'][1] = max($soil);

    $moisture = array_column($data_filter, 'moisture');
    $data['moisture'][0] = min($moisture);
    $data['moisture'][1] = max($moisture);
    if($data['soil'][0] == 0){
        $data['soil'][0] = 'Dry';
    } else if($data['soil'][1] == 0){
        $data['soil'][1] = 'Dry';
    }

    if($data['soil'][0] == 1){
        $data['soil'][0] = 'Wet';
    } else if($data['soil'][1] == 1){
        $data['soil'][1] = 'Wet';
    }
    if($data['soil'][0] == 2){
        $data['soil'][0] = 'Very Wet';
    } else if($data['soil'][1] == 2){
        $data['soil'][1] = 'Very Wet';
    }
    return response()->json($data);

//    $process = new Process(['python', asset('datamine.py')]);
//    $process->run();
//    if(!$process->isSuccessful()){
//        throw new ProcessFailedException($process);
//    }
//    return $process->getOutput();
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
