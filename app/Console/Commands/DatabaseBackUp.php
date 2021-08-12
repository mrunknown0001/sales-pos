<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;

use Config;

class DatabaseBackUp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Database Backup';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $filename = "backup-" . Carbon::now()->format('Y-m-d') . ".gz";
        // $filename = "backup-" . Carbon::now()->format('Y-m-d') . ".sql";

        $dbhost = Config::get('values.dbhost');
        $dbname = Config::get('values.dbname');
        $rdbuser = Config::get('values.rdbuser'); // sql root username
        $rdbpass = Config::get('values.rdbpass'); // sql root password
        
        $command = "sudo mysqldump -u " . $rdbuser ." -p" . $rdbpass . " " . $dbname . " | gzip > " . storage_path() . "/app/backup/" . $filename . " sudo cp " . storage_path() . "/app/backup/" . $filename . " " . public_path() . "/bak/" . $filename;
        
        // $command = "sudo mysqldump -u " . $rdbuser ." -p" . $rdbpass . " " . $dbname . " > " . storage_path() . "/app/backup/" . $filename . " sudo cp " . storage_path() . "/app/backup/" . $filename . " " . public_path() . "/bak/" . $filename;
  
        $returnVar = NULL;

        $output  = NULL;

        exec($command, $output, $returnVar);

        $this->info("Database " . $dbname . "Successfully Backed Up!");
    }
}
