<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromArray;
use App\Transfer;
use App\Http\Controllers\GeneralController as GC;

class TransferExport implements FromArray, WithHeadings, WithStyles, ShouldAutoSize
{
	protected $data;

	// Constructor
    public function __construct()
    {
    	$transfers = Transfer::all();
        $this->data = $transfers->toArray();
    }	

    // Array
    public function array(): array
    {
    	$d = array();

    	foreach($this->data as $a) {
    		array_push($d, [
    			$a['id'],
    			$a['reference_id'],
    			GC::getproductname($a['product_id']),
    			GC::getoumusingproductid($a['product_id']),
    			$a['quantity'],
    			GC::getlocationname($a['location_id']),
    			$a['date']
    		]);

    	}

    	return $d;
    }

    // Heading
    public function headings(): array
    {
        return [
            '#',
            'Reference Number',
            'Product',
            'UOM',
            'Quantity',
            'From',
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
