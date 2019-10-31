<?php

namespace App\Http\Controllers;

use App\DataLog;
use Illuminate\Http\Request;

class DataLogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  DataLog::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datalog = new DataLog();
        $datalog->light = $request->light;
        $datalog->temperature = $request->temperature;
        $datalog->humidity = $request->humidity;
        $datalog->soil = $request->soil;
        $datalog->moisture = $request->moisture;
        $datalog->remarks = $request->remarks;
        $datalog->alive = $request->alive;
        $datalog->save();
        return response()->json(['msg' => 'Created', 'request' => response()->json($request), 'response'=> 201]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DataLog  $dataLog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return  DataLog::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DataLog  $dataLog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DataLog  $dataLog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DataLog  $dataLog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DataLog::find($id)->delete();
        return;
    }
}
