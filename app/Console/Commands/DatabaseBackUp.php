<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;

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
        // $filename = "backup-" . Carbon::now()->format('Y-m-d') . ".gz";
        $filename = "backup-" . Carbon::now()->format('Y-m-d') . ".sql";



        // $command = "mysqldump -u " . env('DB_USERNAME') ." -p " . env('DB_PASSWORD') . " -h " . env('DB_HOST') . " " . env('DB_DATABASE') . "  | gzip > " . storage_path() . "/app/backup/" . $filename;
        $command = "sudo mysqldump -u " . env('ROOT_DB_USERNAME') ." -p" . env('ROOT_DB_PASSWORD') . " -B " . env('DB_DATABASE') . " > " . storage_path() . "/app/backup/" . $filename . " && sudo cp " . storage_path() . "/app/backup/" . $filename . " " . public_path() . "/bak/" . $filename ;


  

        $returnVar = NULL;

        $output  = NULL;

  

        exec($command, $output, $returnVar);
    }
}
