<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Cliente;
use App\Producto;
use App\DetalleProceso;
use App\Categoria;
use App\SubCategoria;
use App\UnitOfMeasurement as UOM;
use App\Posproceso;

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



    // get category name
    public static function getCategoryName($id)
    {
        $cat = Categoria::find($id);

        if(empty($cat)) {
            return "N/A";
        }

        return $cat->nombre;
    }


    // get sub category name
    public static function getSubCategoryName($id)
    {
        $sub = SubCategoria::find($id);

        if(empty($sub)) {
            return "N/A";
        }

        return $sub->nombre;
    }


    // get unit of measurement
    public static function getoum($id)
    {
        $uom = UOM::find($id);

        if(empty($uom)) {
            return "N/A";
        }
        return $uom->uom;
    }


    // get product status
    public static function getstatus($id)
    {
        if($id == 1) {
            return "ACTIVE";
        }
        else {
            return "INACTIVE";
        }
    }




    // get if trays/case then return the number of trays
    public static function getNumberOfTrays($product_id, $quantity)
    {
        $product = Producto::find($product_id);

        $total_trays = 0;

        if($product->uom->uom == 'TRAY') {
            return $quantity;
        }
        if($product->uom->uom == 'CASE') {
            return $quantity * 12;
        }
    }



    // get discount on sales
    // applied for 12 trays | whole sale
    public static function getSalesDiscount($detail, $discount)
    {
        $dis = 0;
        if($discount > 0) {
            if($detail->producto->uom->uom == "TRAY") {
                $dis = $detail->cantidad * 5;
            }
            if($detail->producto->uom->uom == "CASE") {
                $dis = (12 * $detail->cantidad) * 5;
            }
        }
        return $dis;
    }
}
