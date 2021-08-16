<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Configuracion;

use Config;

class RestoreController extends Controller
{
    // Index
    public function index()
    {
        $sistema =  Configuracion::where('id', '=', 1)->firstOrFail();
        return view('Back.configuracion.dbrestore.index', compact('sistema'));
    }


    // Restore
    public function restore(Request $request)
    {	
    	$request->validate([
    		'backup' => 'required'
    	]);

    	if(pathinfo($request->backup->getClientOriginalName(), PATHINFO_EXTENSION) ==='sql'){
		    $request->backup->move(public_path() . "/restore/", $request->backup->getClientOriginalName());

            $dbhost = Config::get('values.dbhost');
	        $dbname = Config::get('values.dbname');
	        $rdbuser = Config::get('values.rdbuser'); // sql root username
	        $rdbpass = Config::get('values.rdbpass'); // sql root password

	        $file_path = public_path() . "/restore/" . $request->backup->getClientOriginalName();

	        exec("sudo mysqladmin -h " . $dbhost . " -u " . $rdbuser . " -p" . $rdbpass . " drop " . $dbname);
	        exec("sudo mysqladmin -h " . $dbhost . " -u " . $rdbuser . " -p" . $rdbpass . " create " . $dbname);
	        exec("sudo mysql -h " . $dbhost . " -u " . $rdbuser . " -p" . $rdbpass . " " . $dbname . " < " . $file_path);


		    return redirect()->route('db.restore')->with('status', 'DB Restored!');
		}

		return abort(500);
    }
}
