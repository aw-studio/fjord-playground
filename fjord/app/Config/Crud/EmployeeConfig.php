<?php

namespace FjordApp\Config\Crud;

use App\Models\Employee;
use Fjord\Crud\CrudForm;
use Fjord\Vue\Crud\CrudTable;
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
     * Index table search keys.
     *
     * @var array
     */
    public $search = ['first_name', 'last_name', 'email'];

    /**
     * Index table sort by default.
     *
     * @var string
     */
    public $sortByDefault = 'id.desc';

    public $perPage = 5;

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
     * Sort by keys.
     *
     * @return array
     */
    public function sortBy()
    {
        return [
            'id.desc' => __f('fj.sort_new_to_old'),
            'id.asc' => __f('fj.sort_old_to_new'),
        ];
    }

    /**
     * Initialize index query.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder $query
     */
    public function indexQuery(Builder $query)
    {
        $query->with('department');
        $query->with('projects');
        $query->withCount('projects');

        return $query;
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
     * Index table filter groups.
     *
     * @return array
     */
    public function filter()
    {
        return [
            'Department' => [
                'development' => 'Development',
                'marketing' => 'Marketing',
                'projectManagement' => 'Project-Management',
                'sales' => 'Sales',
                'humanResources' => 'Human-Resources'
            ],
        ];
    }

    /**
     * Build index table.
     *
     * @param \Fjord\Vue\Crud\CrudTable $table
     * @return void
     */
    public function index(CrudTable $table)
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
     * @param \Fjord\Crud\CrudForm $form
     * @return void
     */
    public function form(CrudForm $form)
    {
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
     * @param \Fjord\Crud\CrudForm $form
     * @return void
     */
    protected function settings(CrudForm $form)
    {
        $form->group(function ($form) {
            $form->image('image')
                ->maxFiles(1)
                ->firstBig()
                ->crop(1 / 1)
                ->title('Profile Image');

            //$form->markdown(File::get(__DIR__ . '/Image.md'));
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
