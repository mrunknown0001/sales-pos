<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
// use Maatwebsite\Excel\Concerns\WithEvents;
// use Maatwebsite\Excel\Events\AfterSheet;

use DB;
use Maatwebsite\Excel\Concerns\FromArray;
use App\Http\Controllers\GeneralController as GC;

class SalesReportExcelReport implements FromArray, WithHeadings, WithStyles, ShouldAutoSize
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
                    $detail->producto->nombre,
                    $detail->producto->categoria->nombre,
                    $detail->producto->subcategoria->nombre,
                    $detail->producto->uom->uom,
                    $detail->cantidad,
                    $detail->subtotal,
                    // $a['total'],
                    GC::getSalesDiscount($detail, $a['descuento']),
                    $detail->subtotal - GC::getSalesDiscount($detail, $a['descuento']),
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
            'Product Name',
            'Category',
            'Sub Category',
            'Unit of Measurement',
            'Quantity',
            'Total w/o Discount',
            // 'Total',
            'Discount',
            'Total with Discount',
            'Type of Payment',
            'Type of Process',
            'Status',
            'Date',
        ];
    }

    // Styles
    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]],
        ];
    }


}
