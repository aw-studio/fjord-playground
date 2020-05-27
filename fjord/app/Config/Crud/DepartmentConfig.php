<?php

namespace FjordApp\Config\Crud;

use Fjord\Crud\CrudForm;
use Fjord\Vue\Crud\CrudTable;
use Fjord\Crud\Config\CrudConfig;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Department;
use FjordApp\Controllers\Crud\DepartmentController;

class DepartmentConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = Department::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = DepartmentController::class;

    /**
     * Index table search keys.
     *
     * @var array
     */
    public $search = ['name'];

    /**
     * Index table sort by default.
     *
     * @var string
     */
    public $sortByDefault = 'id.desc';

    /**
     * Model singular and plural name.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => ucfirst(__f_choice('models.department', 1)),
            'plural' => ucfirst(__f_choice('models.department', 2)),
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
        $query->withCount('Employees');

        return $query;
    }

    /**
     * Index table filter groups.
     *
     * @return array
     */
    public function filter()
    {
        return [];
    }

    /**
     * Build index table.
     *
     * @param \Fjord\Vue\Crud\CrudTable $table
     * @return void
     */
    public function index(CrudTable $table)
    {
        $table->col('Department Name')
            ->value('{name}')
            ->sortBy('name');

        $table->col('Employees')
            ->value('{employees_count}')
            ->small()
            ->sortBy('employees_count');
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
            $this->mainCard($form);
        })->width(12);

        $form->card(function ($form) {
            $this->staff($form);
        })->width(12);
    }

    /**
     * Define form sections in methods to keep the overview.
     *
     * @param \Fjord\Crud\CrudForm $form
     * @return void
     */
    protected function mainCard(CrudForm $form)
    {
        $form->input('name')
            ->title('Name')
            ->rules('max:60')
            ->creationRules('required')
            ->placeholder('Department Name')
            ->hint('The department\'s name')
            ->width(8);
    }

    public function staff($form)
    {
        $form->relation('employees')
            ->title('Staff')
            ->showTableHead()
            ->preview(function ($table) {
                $table->image('Image')
                    ->src('{image.conversion_urls.sm}')
                    ->square('50px')
                    ->small();
                $table->col('Name')->value('{fullName}');
            });
    }
}
