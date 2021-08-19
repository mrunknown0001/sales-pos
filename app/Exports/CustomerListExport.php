<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\FromArray;
use App\Cliente;
use App\Http\Controllers\GeneralController as GC;

class CustomerListExport implements FromArray, WithHeadings, WithStyles, ShouldAutoSize
{	
	protected $data;

	// Constructor
    public function __construct()
    {
    	$customers = Cliente::all();
        $this->data = $customers->toArray();
    }	

    // Array
    public function array(): array
    {
    	$d = array();

    	foreach($this->data as $a) {
    		array_push($d, [
    			$a['id'],
    			$a['nombre'],
    			$a['apellido'],
    			$a['correo'],
    			$a['telefono'],
    			$a['empresa'],
    			$a['direccion'],
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
            'First Name',
            'Last Name',
            'Email',
            'Phone',
            'Company',
            'Address',
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
