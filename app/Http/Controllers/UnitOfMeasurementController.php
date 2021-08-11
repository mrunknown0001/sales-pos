<?php

namespace App\Http\Controllers;

use App\UnitOfMeasurement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Configuracion;

class UnitOfMeasurementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sistema =  Configuracion::where('id', '=', 1)->firstOrFail();
        $datos   =  UnitOfMeasurement::where('active', 1)->get();
        return view('Back.configuracion.uom.index', compact('sistema', 'datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sistema =  Configuracion::where('id', '=', 1)->firstOrFail();
        return view('Back.configuracion.uom.create', compact('sistema'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:unit_of_measurements'
        ]);

        $uom = new UnitOfMeasurement();
        $uom->uom = $request->name;
        $uom->code = $request->code;
        $uom->description = $request->description;

        if($uom->save()) {
            return redirect()->back()->with('status', 'Unit of Measurement Created!');
        }

        return 'Error';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UnitOfMeasurement  $unitOfMeasurement
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $uom = UnitOfMeasurement::findorfail($id);
        $sistema =  Configuracion::where('id', '=', 1)->firstOrFail();
        return view('Back.configuracion.uom.show', compact('uom', 'sistema'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UnitOfMeasurement  $unitOfMeasurement
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $uom = UnitOfMeasurement::findorfail($id);
        $sistema =  Configuracion::where('id', '=', 1)->firstOrFail();
        return view('Back.configuracion.uom.edit', compact('uom', 'sistema'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UnitOfMeasurement  $unitOfMeasurement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $uom = UnitOfMeasurement::findorfail($id);

        if($uom->code != $request->code) {
            $request->validate([
                'code' => 'required|unique:unit_of_measurements'
            ]);
        }

        $uom->uom = $request->name;
        $uom->code = $request->code;
        $uom->description = $request->description;

        if($uom->save()) {
            return redirect()->back()->with('status', 'Unit of Measurement Updated!');
        }

        return 'Error';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UnitOfMeasurement  $unitOfMeasurement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $uom = UnitOfMeasurement::findorfail($id);
        $uom->active = 0;
        if($uom->delete()) {
            return redirect()->route('uom')->with('status', 'Unit of Measurement Deleted!');
        }

        return 'Error';
    }
}
