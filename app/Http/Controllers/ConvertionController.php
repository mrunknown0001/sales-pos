<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Configuracion;
use App\Producto;
use App\UnitOfMeasurement;
use App\Convertion;

use Auth;

use Excel;
use App\Exports\ReclassExport;


class ConvertionController extends Controller
{
    // Index
    public function index()
    {
    	$sistema = Configuracion::find(1);
    	$datos = Convertion::all();
    	return view('Back.convert.index', compact('sistema', 'datos'));
    }


    // Convert Project
    public function convertProduct()
    {
    	$sistema = Configuracion::find(1);
    	$products = Producto::where('status', 1)->get();
    	$uom = UnitOfMeasurement::all();
    	return view('Back.convert.convert', compact('sistema', 'products', 'uom'));
    }


    // Post Convert Product
    public function postConvertProduct(Request $request)
    {
    	$request->validate([
    		'product' => 'required',
    		'quantity' => 'required|numeric',
    		'unit_of_measurement' => 'required',
    	]);

    	// check if selected product is to tray
    	$product = Producto::findorfail($request->product);

    	if($product->uom->uom != "TRAY") {
    		return redirect()->route('convert.product')->with('error', 'Please select product with a unit of TRAY.');
    	}

    	// check if uom selected is pcs
    	if($request->unit_of_measurement != 'pcs') {
    		return redirect()->route('convert.product')->with('error', 'Please check select UoM. It must be in PC(s)');
    	}
 	
    	
    	// check quantity if suffice
    	if($product->cantidad < $request->quantity) {
    		return redirect()->route('convert.product')->with('error', 'Insuficient Quantity.');
    	}
    	if($request->quantity < 1) {
    		return redirect()->route('convert.product')->with('error', 'Invalid Quantity.');
    	}


    	// search same product with a pcs uom
    	// as of 9/13/2021 this is static
    	$uom = UnitOfMeasurement::where('code', 'PCS')->first();

    	$to_product = Producto::where('categoria_id', $product->categoria_id)	
    							->where('subcategoria_id', $product->subcategoria_id)
    							->where('unit_of_measurement_id', $uom->id)
    							->first();

    	if(empty($to_product)) {
    		return redirect()->route('convert.product')->with('error', 'Product Not Exist. Create Similar Product With PCS UoM');
    	} 

    	if($to_product->unit_of_measurement_id == $product->unit_of_measurement_id) {
    		return redirect()->route('convert.product')->with('error', 'Cannot Convert Product with same UoM');
    	}


        // record quantity before
        $quantity_from_before_convert = $product->cantidad;
        $quantity_to_before_convert = $to_product->cantidad;

    	// conversion part tray to pcs
    	$to_quantity = $request->quantity * 30;
    	$product->cantidad -= $request->quantity;
    	$to_product->cantidad += $to_quantity;

    	$con_count = Convertion::count();
    	$ref = 'CON' . sprintf('%06d', $con_count + 1);

    	$convert = new Convertion();
    	$convert->reference_number = $ref;
    	$convert->product_from_id = $product->id;
    	$convert->product_to_id = $to_product->id;
    	$convert->product_from = $product->nombre;
    	$convert->product_to = $to_product->nombre;
    	$convert->uom_from_id = $product->unit_of_measurement_id;
    	$convert->uom_to_id = $to_product->unit_of_measurement_id;
    	$convert->uom_from = $product->uom->uom;
    	$convert->uom_to = $to_product->uom->uom;
    	$convert->quantity_from = $request->quantity;
    	$convert->quantity_to = $to_quantity;
    	$convert->multiplier = 30;
    	$convert->converted_by = Auth::user()->id;

        $product->save();
        $to_product->save();

        $convert->quantity_from_after_convert = $product->cantidad;
        $convert->quantity_to_after_convert = $to_product->cantidad;
        $convert->quantity_from_before_convert = $quantity_from_before_convert;
        $convert->quantity_to_before_convert = $quantity_to_before_convert;

    	$convert->save();

    	return redirect()->route('convert.product')->with('status', 'Product Converted');
    }
}
