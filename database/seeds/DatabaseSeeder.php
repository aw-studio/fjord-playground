<?php

use App\Models\Project;
use App\Models\Employee;
use App\Models\Developer;
use App\Models\ProjectState;
use Faker\Generator as Faker;
use Fjord\Support\Facades\Form;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->permissions();

        $this->developers();
        $this->fillPagesWithContent();

        $departments = ['Development', 'Marketing', 'Project-Management', 'Sales', 'Human-Resources'];
        foreach ($departments as $department) {
            factory(App\Models\Department::class, 1)->create([
                'name' => $department
            ]);
        }

        $this->employees();

        $statuses = [
            'on track',
            'off track',
            'on hold',
            'ready',
            'blocked',
            'finished'
        ];
        foreach ($statuses as $status) {
            factory(App\Models\ProjectState::class, 1)->create([
                'title' => $status
            ]);
        }

        factory(App\Models\Project::class, 20)->create()->each(function ($project) {
            factory(App\Models\Staff::class, rand(1, 5))->create([
                'model_id' => $project->id,
                'model_type' => Project::class,
            ]);
        });
    }

    public function permissions()
    {
        $adminRole = Role::where('name', 'admin')->where('guard_name', 'fjord')->first();

        $adminRole->revokePermissionTo('update fjord-role-permissions');
        $adminRole->revokePermissionTo('delete fjord-users');

        $adminRole->revokePermissionTo('create developers');
        $adminRole->revokePermissionTo('update developers');
        $adminRole->revokePermissionTo('delete developers');
    }

    public function developers()
    {
        $developers = [
            [
                'name' => 'Uwe',
                'task' => 'Design',
                'twitter' => 'https://twitter.com/uwesteffen3',
                'image' => 'dump/developers/uwe.jpg'
            ],
            [
                'name' => 'Jannes',
                'task' => 'Development',
                'twitter' => 'https://twitter.com/jannesb4',
                'image' => 'dump/developers/jannes.jpeg'
            ],
            [
                'name' => 'Lennart',
                'task' => 'Development',
                'twitter' => 'https://twitter.com/lennartcb',
                'image' => 'dump/developers/lennart.jpeg'
            ],
        ];

        foreach ($developers as $developer) {
            $image = $developer['image'] ?? null;
            unset($developer['image']);
            $dev = Developer::create($developer);

            $properties = [
                'title' => null,
                'alt' => null,
            ];

            if ($image) {
                $dev->addMedia(storage_path($image))
                    ->preservingOriginal()
                    ->withCustomProperties($properties)
                    ->toMediaCollection('image');
            }
        }
    }

    public function fillPagesWithContent()
    {
        $images = File::files(storage_path('dump/home'));
        $pages = Form::load('pages');

        $properties = [
            'title' => null,
            'alt' => null,
        ];

        $this->command->info('Upload image to page home.');

        $pages->home->addMedia(storage_path('dump/home-title/fjord_preview.png'))
            ->preservingOriginal()
            ->withCustomProperties($properties)
            ->toMediaCollection('image');

        foreach ($pages->home->portfolio_images as $key => $block) {
            for ($i = 0; $i < 3; $i++) {
                $image = $images[$key + $i];
                $this->command->info('Upload image to portfolio_images block on page home.');

                $media = $block->addMedia($image->getRealPath())
                    ->preservingOriginal()
                    ->withCustomProperties($properties)
                    ->toMediaCollection('images');
            }
        }
    }

    public function employees()
    {
        $images = File::files(storage_path('dump/employees'));

        factory(Employee::class, count($images))->create()->each(function ($employee, $key) use ($images) {
            // First two employees are in project management.
            if ($key == 0 || $key == 1) {
                $employee->department_id = 3;
                $employee->save();
            }

            $image = $images[$key];

            $properties = [
                'title' => null,
                'alt' => null,
            ];
            $this->command->info('Upload employee profile image.');
            $media = $employee->addMedia($image->getRealPath())
                ->preservingOriginal()
                ->withCustomProperties($properties)
                ->toMediaCollection('image');
        });

        return;
        if (!Employee::projectManager()->exists()) {
            // TODO: Add projectmanager
        }
    }
}
