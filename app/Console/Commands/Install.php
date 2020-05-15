<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Fjord\User\Models\FjordUser;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fjord-playground:install';

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
        File::cleanDirectory(storage_path('app/public'));
        $this->line('Cleaned storage.');

        $this->call('migrate:fresh');

        $this->call('fjord:install');

        $this->call('dump:load');

        $this->call('db:seed');
    }
}
