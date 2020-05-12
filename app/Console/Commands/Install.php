<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Fjord\User\Models\FjordUser;
use Illuminate\Support\Facades\Hash;

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
        $this->call('migrate:fresh', [
            '--seed' => true,
        ]);

        $this->call('fjord:install');

        $this->call('dump:load');
    }
}
