<?php

namespace FjordApp\Controllers\Crud;

use App\Models\Project;

use App\Models\ProjectState;
use Fjord\User\Models\FjordUser;
use Illuminate\Database\Eloquent\Builder;
use Fjord\Crud\Controllers\CrudController;
use Fjord\Crud\Requests\CrudUpdateRequest;

class ProjectController extends CrudController
{
    /**
     * Crud model class name.
     *
     * @var string
     */
    protected $model = \App\Models\Project::class;

    /**
     * Authorize request for permission operation and authenticated fjord-user.
     * Operations: create, read, update, delete
     *
     * @param FjordUser $user
     * @param string $operation
     * @return boolean
     */
    public function authorize(FjordUser $user, string $operation): bool
    {
        return $user->can("{$operation} projects");
    }

    /**
     * Initial query.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(): Builder
    {
        return $this->model::query();
    }

    public function setProjectState(CrudUpdateRequest $request, Project $project)
    {
        $project->update([
            'project_states_id' => ProjectState::findOrFail($request->state)->id
        ]);

        return response()->json('success', 200);
    }
}
