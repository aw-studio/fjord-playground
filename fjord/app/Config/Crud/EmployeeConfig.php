<?php

namespace FjordApp\Config\Crud;

use App\Models\Employee;
use Fjord\Crud\CrudShow;
use Fjord\Crud\CrudIndex;
use Fjord\Crud\Config\CrudConfig;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Builder;
use FjordApp\Controllers\Crud\EmployeeController;

class EmployeeConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = Employee::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = EmployeeController::class;

    /**
     * Model singular and plural name.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => ucfirst(__f_choice('models.employee', 1)),
            'plural' => ucfirst(__f_choice('models.employee', 2)),
        ];
    }

    /**
     * Index component.
     *
     * @param Component $component
     * @return void
     */
    public function indexComponent($component)
    {
        $component->slot('headerControls', 'export-employees-button');
        $component->slot('navControls', 'export-employees-control');
    }

    /**
     * Route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'stargazers';
    }

    /**
     * Build index table.
     *
     * @param \Fjord\Crud\CrudIndex $table
     * @return void
     */
    public function index(CrudIndex $container)
    {
        $container->table(fn ($table) => $this->indexTable($table))
            ->query(fn ($query) => $query
                ->with('department')
                ->with('projects')
                ->withCount('projects'))
            ->filter([
                'Department' => [
                    'development' => 'Development',
                    'marketing' => 'Marketing',
                    'projectManagement' => 'Project-Management',
                    'sales' => 'Sales',
                    'humanResources' => 'Human-Resources'
                ],
            ])
            ->perPage(5)
            ->search('first_name', 'last_name', 'email');
    }

    /**
     * Index table
     *
     * @param CrudIndexTable $table
     * @return void
     */
    public function indexTable($table)
    {
        $table->image('Image')
            ->src('{image.conversion_urls.sm}')
            ->square('50px')
            ->small();

        $table->col('Name')
            ->value('{first_name} {last_name}')
            ->sortBy('last_name');

        $table->col('Department')
            ->value('{department.name}');

        $table->component('employees-projects')
            ->value('{projects}')
            ->label('Projects')
            ->sortBy('projects_count');

        $table->component('employees-actions')
            ->value('{projects}')
            ->label('')
            ->link(false)
            ->small();
    }

    /**
     * Setup create and edit form.
     *
     * @param \Fjord\Crud\CrudShow $form
     * @return void
     */
    public function show(CrudShow $form)
    {
        $form->info('')
            ->text(fa('fab', 'github') . ' <a href="https://github.com/aw-studio/fjord-playground/blob/master/fjord/app/Config/Crud/EmployeeConfig.php" target="_blank">See the code for this page on github.</a>')
            ->width(12);

        $form->card(function ($form) {
            $this->settings($form);
        })->width(12);

        $form->card(function ($form) {
            $this->projects($form);
        })->width(12);
    }

    /**
     * Define form sections in methods to keep the overview.
     *
     * @param \Fjord\Crud\CrudShow $form
     * @return void
     */
    protected function settings(CrudShow $form)
    {
        $form->group(function ($form) {
            $form->image('image')
                ->maxFiles(1)
                ->firstBig()
                ->crop(1 / 1)
                ->title('Profile Image');

            $form->markdown(File::get(__DIR__ . '/Image.md'));
        })->width(4);


        $form->group(function ($form) {
            $form->input('first_name')
                ->rules('max:60')
                ->creationRules('required')
                ->title('Firstname')
                ->placeholder('Firstname');

            $form->input('last_name')
                ->rules('max:60')
                ->creationRules('required')
                ->title('Lastname')
                ->placeholder('Lastname');

            $form->input('email')
                ->creationRules('required')
                ->rules('max:60', 'email:rfc,dns')
                ->title('E-mail')
                ->placeholder('E-mail')
                ->hint('The employee\'s email-address');

            $form->select('department_id')
                ->title('Department')
                ->options(\App\Models\Department::all()->mapWithKeys(function ($item, $key) {
                    return [$item->id => $item->name];
                })->toArray())
                ->hint('Select Department');
        })->width(8);
    }

    public function projects($form)
    {
        $form->relation('projects')
            ->title('Projects')
            ->showTableHead()
            ->preview(function ($table) {
                $table->col('Title')->value('{title}');
            });
    }
}
