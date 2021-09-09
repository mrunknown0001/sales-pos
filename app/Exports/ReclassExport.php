<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromArray;
use App\Reclass;
use App\Http\Controllers\GeneralController as GC;

class ReclassExport implements FromArray, WithHeadings, WithStyles, ShouldAutoSize
{
	protected $data;

	// Constructor
    public function __construct()
    {
    	$reclass = Reclass::all();
        $this->data = $reclass->toArray();
    }


    // Array
    public function array(): array
    {
    	$d = array();

    	foreach($this->data as $a) {
    		array_push($d, [
    			$a['id'],
    			$a['reference_id'],
    			$a['from_product'],
    			$a['to_product'],
    			GC::getoumusingproductid($a['from_product_id']),
    			$a['quantity'],
    			GC::getuser($a['reclass_by']),
    			$a['created_at']
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
            'From',
            'To',
            'UOM',
            'Quantity',
            'Reclass By',
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
