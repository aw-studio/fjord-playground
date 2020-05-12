<?php

namespace App\Http\Controllers\Fjord\Actions;

use Fjord\Support\Facades\FjordRoute;
use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\ProjectState;

trait SetProjectState
{
    public function makeSetProjectStatusRoute()
    {
        FjordRoute::post("/set-project-status/{project}", self::class . "@setProjectState");
    }

    protected function setProjectStatus(Request $request, Project $project)
    {
        $project->update([
            'project_states_id' => ProjectState::firstWhere('title', $request->status)->id
        ]);

        return response()->json('success', 200);
    }
}
