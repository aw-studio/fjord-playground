<?php

namespace App\Http\Controllers\Fjord\Actions;

use AwStudio\Fjord\Support\Facades\FjordRoute;
use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\ProjectStatus;

trait SetProjectStatus
{
    public function makeSetProjectStatusRoute()
    {
        FjordRoute::post("/set-project-status/{project}", self::class . "@setProjectStatus");
    }

    protected function setProjectStatus(Request $request, Project $project)
    {
        $project->update([
            'project_status_id' => ProjectStatus::firstWhere('title', $request->status)->id
        ]);

        return response()->json('success', 200);
    }
}
