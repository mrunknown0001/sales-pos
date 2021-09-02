<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Configuracion;

class ReclassController extends Controller
{
    // Index
    public function index()
    {
    	$sistema = Configuracion::find(1);
    	return view('Back.reclass.index', compact('sistema'));
    }
}
