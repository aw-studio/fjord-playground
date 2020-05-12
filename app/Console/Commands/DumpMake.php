<?php

namespace App\Console\Commands;

use mysqli;
use MySQLDump;
use Illuminate\Console\Command;

class DumpMake extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dump:make';

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

        $dump = new MySQLDump($db);
        $dump->tables['*'] = MySQLDump::NONE;

        $dump->tables['form_blocks'] = MySQLDump::DATA;
        $dump->tables['form_block_translations'] = MySQLDump::DATA;
        $dump->tables['form_relations'] = MySQLDump::DATA;
        $dump->tables['form_fields'] = MySQLDump::DATA;
        $dump->tables['form_field_translations'] = MySQLDump::DATA;
        $dump->tables['media'] = MySQLDump::DATA;
        $dump->save(base_path('database/dumps/fjord.sql'));

        $this->info('created sql dump database/dumps/fjord.sql');
    }
}
