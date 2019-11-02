<?php

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

use App\DataLog;
use App\Plant;

Route::view('/', 'index')->name('home');

Route::get('/datalog', function () {
    return view('datalog');
});

Route::group(['prefix' => 'plant', 'as' => 'plants.'], function(){
   Route::view('/', 'plant.index')->name('index');
   Route::get('/{id}', function($id){
       $plant = Plant::find($id);
       return view('plant.view', compact('plant'));
   })->where('id', '[0-9]+')->name('view');
   Route::get('/plantlog/{id}', function($id){
       $plantlog = Plant::find($id)->datalogs()->get();
        return view('plant.data', compact('plantlog'));
    })->name('log');
    Route::view('/create', 'plant.create')->name('create');
    Route::get('/edit/{id}', function($id){
        $plant = Plant::find($id);
        return view('plant.edit', compact('plant'));
    })->name('edit');
});

Route::group(['prefix' => 'datalog', 'as' => 'datalogs.'], function(){
    Route::view('/', 'datalog.index')->name('index');
    Route::get('/{id}', functioN($id){
        $datalog = DataLog::find($id);
        return view('datalog.view', compact('datalog'));
    })->name('view');
});



