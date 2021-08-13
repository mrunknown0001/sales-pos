<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Configuracion;
use App\DatabaseBackup;
use Response;

class DatabaseBackupController extends Controller
{
    // Index
    public function index()
    {
        $sistema =  Configuracion::where('id', '=', 1)->firstOrFail();
        $datos   =  DatabaseBackup::all();
        return view('Back.configuracion.dbbackup.index', compact('sistema', 'datos'));
    }


    // Download DB Backup
    public function download($id)
    {
    	$file = DatabaseBackup::findorfail($id);
    	return Response::download(public_path() . "/bak/" . $file->filename);
    }


    // Run db backup now
    public function run()
    {
    	$message = exec("php " . base_path() . "/" . "artisan database:backup");

    	return redirect()->route('db.backup')->with('info', $message);
    }


    // remove backup db
    public function remove($id)
    {
    	$message = exec("php " . base_path() . "/" . "artisan database:delete-backup " . $id);
    	return redirect()->route('db.backup')->with('info', $message);
    }
}
