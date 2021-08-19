<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromArray;
use App\Producto;
use App\Http\Controllers\GeneralController as GC;

class ProductListExport implements FromArray, WithHeadings, WithStyles, ShouldAutoSize
{	
	protected $data;

	// Constructor
    public function __construct()
    {
    	$products = Producto::all();
        $this->data = $products->toArray();
    }	

    // Array
    public function array(): array
    {
    	$d = array();

    	foreach($this->data as $a) {
    		array_push($d, [
    			$a['id'],
    			$a['codigo'],
    			$a['cantidad'],
    			$a['nombre'],
    			GC::getCategoryName($a['categoria_id']),
    			GC::getSubCategoryName($a['subcategoria_id']),
    			GC::getoum($a['unit_of_measurement_id']),
                GC::getstatus($a['status']),
    		]);

    	}

    	return $d;
    }


    // Heading
    public function headings(): array
    {
        return [
            '#',
            'Code',
            'Stock',
            'Name',
            'Category',
            'Sub Category',
            'Unit of Measurement',
            'Status',
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
