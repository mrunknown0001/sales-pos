<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;
use Maatwebsite\Excel\Concerns\FromArray;
use App\Http\Controllers\GeneralController as GC;

class SalesReportExcelReport implements FromArray, WithHeadings
{

	protected $data;

	// Constructor
    public function __construct(array $data)
    {
        $this->data = $data;
    }	

    // Array
    public function array(): array
    {
    	$d = array();

    	foreach($this->data as $a) {
            $details = GC::getSalesDetails($a['codigo_proceso']);
            foreach($details as $detail) {
        		array_push($d, [
        			$a['id'],
        			$a['codigo_proceso'],
        			GC::getClientName($a['cliente_id']),
                    $detail->producto->categoria->nombre,
                    $detail->producto->subcategoria->nombre,
                    $detail->cantidad,
                    $detail->subtotal,
                    $a['total'],
        			$a['tipo_pago'],
        			$a['tipo_proceso'],
        			GC::getSalesStatus($a['status']),
        			date('F j, Y H:i A', strtotime($a['created_at']))
        		]);
            }
    	}

    	return $d;
    }

    // Heading
    public function headings(): array
    {
        return [
            '#',
            'Invoice',
            'Customer',
            'Category',
            'Sub Category',
            'Quantity',
            'Sub Total',
            'Total',
            'Type of Payment',
            'Type of Process',
            'Status',
            'Date',
        ];
    }


}
