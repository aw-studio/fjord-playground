<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $departments = ['Development', 'Marketing', 'Project-Management', 'Sales', 'Human-Resources'];
        foreach ($departments as $department) {
            factory(App\Models\Department::class, 1)->create([
                'name' => $department
            ]);
        }

        factory(App\Models\Employee::class, 200)->create();

        $statuses = [
            'on track',
            'off track',
            'on hold',
            'ready',
            'blocked',
            'finished'
        ];
        foreach ($statuses as $status) {
            factory(App\Models\ProjectStatus::class, 1)->create([
                'title' => $status
            ]);
        }

        factory(App\Models\Project::class, 20)->create();

        factory(App\Models\Staff::class, 40)->create();
    }
}
