<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use AwStudio\Fjord\Fjord\Models\FjordUser;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


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
        $this->call('fjord:crud-permissions');


        $user = FjordUser::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('secret'),
        ]);

        $user->assignRole('admin');

        $permissions = Permission::where('guard_name', 'fjord')->get();
        $role = Role::where('name', 'admin')->first();

        foreach ($permissions as $permission) {
            $role->givePermissionTo($permission->name);
        }
    }
}
