<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        //$registros = Vehicle::paginate(10);
        $registros= Vehicle::where('plate', 'like','%'.$texto.'%')->paginate(10);
        return view('vehicles.index', compact('registros','texto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return view('vehicle.create');
        $vehicle = new Vehicle();
        return view('vehicles.action',['vehicle'=>new Vehicle()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Vehicle::create($request->all());

        $registro = new Vehicle();
        $registro->plate=$request->input('plate');
        $registro->model=$request->input('model');
        $registro->owner=$request->input('owner');
        $registro->save();

        return response()->json([
            'status'=> 'success',
            'message'=> 'Record created successfully'
        ]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('vehicles.action',compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);
        //$vehicle->update($request->all());
        $vehicle->plate=$request->plate;
        $vehicle->model=$request->model;
        $vehicle->owner=$request->owner;
        $vehicle->save();
        return response()->json([
            "status"=> "success",
            "message"=> "Updated successfully"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();

        return response()->json([
            'status' => 'success',
            'message' => $vehicle->plate . ' Eliminado'
        ]);
    }
}
