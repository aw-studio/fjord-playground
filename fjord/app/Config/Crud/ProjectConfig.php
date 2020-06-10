<?php

namespace FjordApp\Config\Crud;

use App\Models\Project;
use Fjord\Crud\CrudShow;
use App\Models\ProjectState;
use Fjord\Crud\CrudIndex;

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

    /**
     * Preview route.
     *
     * @param \App\Models\Project $project
     * @return string
     */
    public function previewRoute($project)
    {
        return route('project', ['slug' => $project->slug]);
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
     * Build index table.
     *
     * @param \Fjord\Crud\CrudIndex $table
     * @return void
     */
    public function index(CrudIndex $container)
    {
        $container->table(fn ($table) => $this->indexTable($table))
            ->query(fn ($query) => $query
                ->with('manager')
                ->with('status')
                ->with('staff.department'))
            ->filter([
                'Status' => [
                    "onTrack" => "on track",
                    "offTrack" => "off track",
                    "onHold" => "on hold",
                    "ready" => "ready",
                    "blocked" => "blocked",
                    "finished" => "finished"
                ],
            ])
            ->perPage(5)
            ->search('title', 'manager.last_name');
    }

    /**
     * Index table
     *
     * @param CrudIndexTable $table
     * @return void
     */
    public function indexTable($table)
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
     * @param \Fjord\Crud\CrudShow $form
     * @return void
     */
    public function show(CrudShow $form)
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
     * @param \Fjord\Crud\CrudShow $form
     * @return void
     */
    protected function mainCard(CrudShow $form)
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
