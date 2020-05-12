<?php

namespace App\Console\Commands;

use mysqli;
use Exception;
use MySQLDump;
use MySQLImport;
use Illuminate\Console\Command;

class DumpLoad extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dump:load';

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
        $db = new mysqli(env('DB_HOST'), env('DB_USERNAME'), env('DB_PASSWORD'), env('DB_DATABASE'));

        $import = new MySQLImport($db);
        try {
            $import->load(base_path('database/dumps/fjord.sql'));
        } catch (Exception $e) {
            return $this->error('couldnt import sql dump, the table must be empty.');
        }

        $this->info('imported sql dump database/dumps/fjord.sql');
    }
}
