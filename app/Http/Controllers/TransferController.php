<?php

namespace App\Http\Controllers;

use App\Transfer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Configuracion;
use App\Producto;
use App\Location;

class TransferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sistema =  Configuracion::where('id', '=', 1)->firstOrFail();
        $datos = Transfer::all();
        return view('Back.transfer.index', compact('datos', 'sistema'));
    }



    // Receive
    public function receive()
    {
        $sistema =  Configuracion::where('id', '=', 1)->firstOrFail();
        $products = Producto::where('status', 1)->get();
        $locations = Location::where('active', 1)->get();
        return view('Back.transfer.receive', compact('sistema', 'products', 'locations'));
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
        $request->validate([
            'reference_id' => 'required',
            'location' => 'required',
            'product' => 'required',
            'quantity' => 'required',
            'date' => 'required'
        ]);

        $transfer = new Transfer();
        $transfer->reference_id = $request->reference_id;
        $transfer->location_id = $request->location;
        $transfer->product_id = $request->product;
        $transfer->quantity = $request->quantity;
        $transfer->date = date('Y-m-d', strtotime($request->date));
        $transfer->remarks = $request->remarks;

        $product = Producto::findorfail($request->product);
        $product->cantidad += $request->quantity;
        $product->save();

        if($transfer->save()) {
            return redirect()->back()->with('status', 'Transfer Successful');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function show(Transfer $transfer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function edit(Transfer $transfer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transfer $transfer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transfer  $transfer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transfer $transfer)
    {
        //
    }
}
