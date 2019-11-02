<?php

namespace App\Http\Controllers;

use App\Plant;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Plant::all());
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
        $plant = new Plant();
        $plant->name = $request->name;
        $plant->scientific_name = $request->scientific_name;
        $plant->kingdom = $request->kingdom;
        $plant->sub_kingdom = $request->sub_kingdom;
        $plant->super_division = $request->super_division;
        $plant->division = $request->division;
        $plant->phylum = $request->phylum;
        $plant->class = $request->class;
        $plant->sub_class = $request->sub_class;
        $plant->order = $request->order;
        $plant->family = $request->family;
        $plant->genus = $request->genus;
        $plant->species = $request->species;
        $plant->variety = $request->variety;
        $plant->description = $request->description;
        $plant->save();
        return redirect(route('plants.index'))->with(['msg' => 'created', 'response' => 201, 'request' => $plant]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Plant::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $plant = Plant::find($id);
        $plant->name = $request->name;
        $plant->scientific_name = $request->scientific_name;
        $plant->kingdom = $request->kingdom;
        $plant->sub_kingdom = $request->sub_kingdom;
        $plant->super_division = $request->super_division;
        $plant->division = $request->division;
        $plant->phylum = $request->phylum;
        $plant->class = $request->class;
        $plant->sub_class = $request->sub_class;
        $plant->order = $request->order;
        $plant->family = $request->family;
        $plant->genus = $request->genus;
        $plant->species = $request->species;
        $plant->variety = $request->variety;
        $plant->description = $request->description;
        $plant->save();

        return response()->json(['msg' => 'updated', $plant]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plant  $plant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plant = Plant::find($id)->delete();
        return redirect(route('plants.index'))->with(['msg'=> 'Deleted', 'response'=> 204]);
    }
}
