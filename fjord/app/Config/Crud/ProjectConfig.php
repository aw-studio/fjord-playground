<?php

namespace FjordApp\Config\Crud;

use App\Models\Project;
use Fjord\Crud\CrudForm;
use App\Models\ProjectState;
use Fjord\Vue\Crud\CrudTable;

use Fjord\Crud\Config\CrudConfig;
use Illuminate\Database\Eloquent\Builder;
use FjordApp\Controllers\Crud\ProjectController;

class ProjectConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = Project::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = ProjectController::class;

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

    /**
     * Model singular and plural name.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => ucfirst(__f_choice('models.project', 1)),
            'plural' => ucfirst(__f_choice('models.project', 2)),
        ];
    }

    public function previewRoute($project)
    {
        return route('project', ['slug' => $project->slug]);
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
        $query->with('manager');
        $query->with('status');
        $query->with('staff.department');

        return $query;
    }

    /**
     * Index table filter groups.
     *
     * @return array
     */
    public function filter()
    {
        return [
            'Status' => [
                "onTrack" => "on track",
                "offTrack" => "off track",
                "onHold" => "on hold",
                "ready" => "ready",
                "blocked" => "blocked",
                "finished" => "finished"
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
        $table->col('Title')
            ->value('{title}')
            ->sortBy('title');

        $table->col('Projectmanager')
            ->value('{manager.last_name}')
            ->sortBy('manager.last_name');

        $table->component('projects-state')
            ->prop('states', ProjectState::all())
            ->link(false)
            ->label('Status');

        $table->component('projects-completion')
            ->label('Days left')
            ->sortBy('completion_date')
            ->small();

        $table->component('projects-team')
            ->label('Staff')
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
            $this->mainCard($form);
        })->cols(12);
    }

    /**
     * Define form sections in methods to keep the overview.
     *
     * @param \Fjord\Crud\CrudForm $form
     * @return void
     */
    protected function mainCard(CrudForm $form)
    {
        $form->input('title')
            ->title('Title')
            ->hint('The project\'s title')
            ->cols(6);

        $form->select('employee_id')
            ->title('Projectmanager')
            ->options(\App\Models\Employee::projectManagement()->get()->mapWithKeys(function ($item, $key) {
                return [$item->id => $item->fullName];
            })->toArray())
            ->hint('Select a Projectmanager')
            ->cols(6);

        $form->relation('staff')
            ->title('Staff')
            ->preview(function ($table) {
                $table->image('Image')->src('{image.conversion_urls.sm}')->square('50px')->small();
                $table->col('Name')->value('{first_name} {last_name}');
            });
    }
}
