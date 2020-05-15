<?php

namespace FjordApp\Config\Crud;

use Fjord\Crud\CrudForm;
use Fjord\Vue\Crud\CrudTable;
use Fjord\Crud\Config\CrudConfig;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Employee;
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
    public $search = ['title'];

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
            ->value('{department.name}')
            ->sortBy('department.name');

        $table->component('employees-projects')
            ->value('{projects}')
            ->label('Projects')
            ->sortBy('projects.title');

        $table->component('employees-actions')
            ->value('{projects}')
            ->label('Projects')
            ->sortBy('projects.title')
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
        })->cols(12);

        $form->card(function ($form) {
            $this->projects($form);
        })->cols(12);
    }

    /**
     * Define form sections in methods to keep the overview.
     *
     * @param \Fjord\Crud\CrudForm $form
     * @return void
     */
    protected function settings(CrudForm $form)
    {
        $form->image('image')
            ->maxFiles(1)
            ->firstBig()
            ->title('Profile Image')
            ->cols(4);

        $form->col(8, function ($col) {
            $col->input('first_name')
                ->title('Firstname')
                ->placeholder('Firstname');

            $col->input('last_name')
                ->title('Lastname')
                ->placeholder('Lastname');

            $col->input('email')
                ->title('E-mail')
                ->placeholder('E-mail')
                ->hint('The employee\'s email-address');

            $col->select('department_id')
                ->title('Department')
                ->options(\App\Models\Department::all()->mapWithKeys(function ($item, $key) {
                    return [$item->id => $item->name];
                })->toArray())
                ->hint('Select Department');
        });
    }

    public function projects($form)
    {
        $form->relation('projects')
            ->title('Projects')
            ->preview(function ($table) {
                $table->col('Title')->value('{title}');
            });
    }
}
