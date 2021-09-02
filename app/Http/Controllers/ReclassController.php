<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Configuracion;
use App\Producto;
use App\Reclass;

use Auth;

class ReclassController extends Controller
{
    // Index
    public function index()
    {
    	$sistema = Configuracion::find(1);
    	$datos = Reclass::all();
    	return view('Back.reclass.index', compact('sistema', 'datos'));
    }



    // Reclass
    public function reclass()
    {
    	$sistema = Configuracion::find(1);
    	$products = Producto::where('status', 1)->get();
    	return view('Back.reclass.reclass', compact('sistema', 'products'));
    }


    // Post Reclass
    public function postReclass(Request $request)
    {
    	$request->validate([
    		'from_product' => 'required',
    		'to_product' => 'required',
    		'quantity' => 'required|numeric',
    		'date' => 'required'
    	]);

    	// validate
    	$from_product = Producto::findorfail($request->from_product);
    	$to_product = Producto::findorfail($request->to_product);

    	if($from_product->id == $to_product->id) {
    		return redirect()->route('reclass.product')->with('error', 'You cannot reclass product on its own.');
    	}

    	// you cant reclass products with different unit of measurment
    	if($from_product->unit_of_measurement_id != $to_product->unit_of_measurement_id) {
    		return redirect()->route('reclass.product')->with('error', 'You cannot reclass products with different Unit of Measurement.');
    	}

    	if($from_product->cantidad < $request->quantity) {
    		return redirect()->route('reclass.product')->with('error', 'Insuficient Stock on ' . $from_product->nombre);
    	}

    	// create reference id
    	$rc_count = Reclass::count();

    	$ref = 'RC' . sprintf('%06d', $rc_count + 1);

    	$rc = new Reclass();
    	$rc->reference_id = $ref;
    	$rc->from_product_id = $from_product->id;
    	$rc->to_product_id = $to_product->id;
    	$rc->from_product = $from_product->nombre;
    	$rc->to_product = $to_product->nombre;
    	$rc->quantity = $request->quantity;
    	$rc->timestamp = date('Y-m-d', strtotime($request->date));
    	$rc->reclass_by = Auth::user()->id;
    	// save & deduct and add to products involved
    	$rc->save();
    	$from_product->cantidad -= $request->quantity;
    	$to_product->cantidad += $request->quantity;
    	$from_product->save();
    	$to_product->save();

    	return redirect()->route('reclass.product')->with('status', 'Reclassification Successful!');
    }
}
