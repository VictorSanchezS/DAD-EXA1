<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $registros= Entry::where('plate', 'like','%'.$texto.'%')->paginate(10);
        return view('entries.index', compact('registros','texto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $entry = new Entry();
        $cars = Vehicle::all(); // Obtener todas las placas de la tabla cars
        return view('entries.action', compact('entry', 'cars'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $registro = new Entry();
        $registro->plate=$request->input('plate');
        $registro->date=$request->input('date');

        /* $registro->image= $request->input('image') ? str_replace(' ','',$request->input('image').'.png') : "img.png"; */
        //$registro->image = "img.png";
        $registro->save();
        //return redirect()->route('entry.index');
        return response()->json([
            'status'=> 'success',
            'message'=> 'Record created successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Entry $entry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $entry = Entry::findOrFail($id);
        $cars = Vehicle::all(); // Obtener todas las placas de la tabla cars
        return view('entries.action', compact('entry', 'cars'));
        //return view('entry.action',compact('entry'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //$entry = Entry::findOrFail($request->id);
        $entry = Entry::findOrFail($id);
        $entry->plate=$request->plate;
        $entry->date=$request->date;
        $entry->save();
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
        $entry = Entry::findOrFail($id);
        $entry->delete();

        return response()->json([
            'status' => 'success',
            'message' => $entry->plate . ' Eliminado'
        ]);
    }
}
