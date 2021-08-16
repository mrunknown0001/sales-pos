<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Cliente;
use App\Producto;
use App\DetalleProceso;

class GeneralController extends Controller
{
    // Get Client/Customer Name
    public static function getClientName($id)
    {
    	$c = Cliente::where('id',$id)->first();
    	if(empty($c)) {
    		return NULL;
    	}
    	return $c->nombre . ' ' . $c->apellido;
    }

    // Get Sales Status
    public static function getSalesStatus($status)
    {
    	if($status == 1) {
    		return 	'PENDING';
    	}
        // return 'APPROVED';
        return 'PROCESSED';
    } 



    // get deetails of sales
    public static function getSalesDetails($code)
    {
        $details = DetalleProceso::where('codigo_proceso', $code)->get();

        return $details;
    }
}
