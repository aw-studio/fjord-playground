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
    public $search = ['title', 'manager.last_name'];

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
     * Route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'projects';
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
        $form->info('')
            ->text(fa('fab', 'github') . ' <a href="https://github.com/aw-studio/fjord-playground/blob/master/fjord/app/Config/Crud/ProjectConfig.php" target="_blank">See the code for this page on github.</a>')
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
     * @param \Fjord\Crud\CrudForm $form
     * @return void
     */
    protected function mainCard(CrudForm $form)
    {
        $form->input('title')
            ->title('Title')
            ->rules('max:60')
            ->hint('The project\'s title')
            ->width(6);

        $form->select('employee_id')
            ->title('Projectmanager')
            ->options(\App\Models\Employee::projectManagement()->get()->mapWithKeys(function ($item, $key) {
                return [$item->id => $item->fullName];
            })->toArray())
            ->hint('Select a Projectmanager')
            ->width(6);

        $form->dt('completion_date')
            ->title('Completion Date')
            ->width(4);

        $form->input('budget')
            ->type('number')
            ->prepend('$')
            ->title('Budget')
            ->width(4);

        $form->select('project_states_id')
            ->title('State')
            ->options(\App\Models\ProjectState::all()->mapWithKeys(function ($item, $key) {
                return [$item->id => $item->title];
            })->toArray())
            ->hint('Select a State')
            ->width(4);
    }

    public function staff($form)
    {
        $form->relation('staff')
            ->title('Staff')
            ->showTableHead()
            ->preview(function ($table) {
                $table->image('Image')->src('{image.conversion_urls.sm}')->square('50px')->small();
                $table->col('Name')->value('{first_name} {last_name}');
            });
    }
}
