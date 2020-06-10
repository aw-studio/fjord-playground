<?php

namespace FjordApp\Config\Crud;

use Fjord\Crud\CrudShow;
use Fjord\Crud\CrudIndex;
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
     * Route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'departments';
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
            ->query(fn ($query) => $query->withCount('Employees'))
            ->search('name');
    }

    /**
     * Index table
     *
     * @param CrudIndexTable $table
     * @return void
     */
    public function indexTable($table)
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
     * @param \Fjord\Crud\CrudShow $form
     * @return void
     */
    public function show(CrudShow $form)
    {
        $form->info('')
            ->text(fa('fab', 'github') . ' <a href="https://github.com/aw-studio/fjord-playground/blob/master/fjord/app/Config/Crud/DepartmentConfig.php" target="_blank">See the code for this page on github.</a>')
            ->width(12);

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
     * @param \Fjord\Crud\CrudShow $form
     * @return void
     */
    protected function mainCard(CrudShow $form)
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
