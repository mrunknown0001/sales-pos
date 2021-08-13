<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Cliente;

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
}
