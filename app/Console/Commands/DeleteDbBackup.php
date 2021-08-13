<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Config;
use App\DatabaseBackup as DBBackup;

class DeleteDbBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:delete-backup {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Database Backup';

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
        $id = $this->argument('id');

        // delete backup record and backup files
        // delete record
        $bak = DBBackup::find($id);

        if(empty($bak)) {
            $this->info('Database Backup not found!');
        }
        else {
            $command = "sudo rm -f " . stroge_path() . "/app/backup/" . $bak->filename . " && sudo rm -f " . public_path() . "/bak/" . $filename;
            $output = NULL;
            $returnVar = NULL;
            if(PHP_OS_FAMILY == "Linux") {
                exec($command, $output, $returnVar);
                $ba->delete();
                $this->info("Database Backup Removed!");
            }
            else {
                $this->info("Operation is Unable to perform on this OS!");
            }
        }

    }
}
