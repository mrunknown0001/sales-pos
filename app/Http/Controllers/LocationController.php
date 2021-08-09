<?php

namespace App\Http\Controllers;

use App\Location;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Configuracion;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sistema =  Configuracion::where('id', '=', 1)->firstOrFail();
        $datos   =  Location::where('active', 1)->get();
        return view('Back.configuracion.locations.index', compact('sistema', 'datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sistema =  Configuracion::where('id', '=', 1)->firstOrFail();
        return view('Back.configuracion.locations.create', compact('sistema'));
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
            'location_name' => 'required',
            'location_code' => 'required|unique:locations'
        ]);

        $location = new Location();
        $location->location_name = $request->location_name;
        $location->location_code = $request->location_code;

        if($location->save()) {
            return redirect()->back()->with('status', 'Location Added');
        }

        return 'error';
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $location = Location::findorfail($id);
        $sistema =  Configuracion::where('id', '=', 1)->firstOrFail();
        return view('Back.configuracion.locations.show', compact('location', 'sistema'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location = Location::findorfail($id);
        $sistema =  Configuracion::where('id', '=', 1)->firstOrFail();
        return view('Back.configuracion.locations.edit', compact('location', 'sistema'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'location_name' => 'required',
        ]);

        $location = Location::where('active', 1)->where('id', $id)->first();
        if($location->location_code != $request->location_code) {
            $request->validate([
                'location_code' => 'required|unique:locations'
            ]);
        }

        $location->location_name = $request->location_name;
        $location->location_code = $request->location_code;
        if($location->save()) {
            return redirect()->route('location.show', $location->id)->with('status', 'Location Update');
        }

        return 'error';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Location::findorfail($id);
        $location->active = 0;
        if($location->save()) {
            return redirect()->route('locations')->with('status', 'Location Removed!');
        }

        return 'error';
    }
}
