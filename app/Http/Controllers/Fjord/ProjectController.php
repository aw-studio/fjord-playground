<?php

namespace App\Http\Controllers\Fjord;

use Fjord\Form\Controllers\CrudController;
use Fjord\Form\Controllers\Traits\CrudIndexDeleteAll;
use Fjord\Form\Controllers\Traits\CrudShowForm;
use Fjord\Form\Controllers\Traits\CrudShowPreview;

class ProjectController extends CrudController
{
    use CrudIndexDeleteAll,
        CrudShowForm,
        CrudShowPreview,
        Actions\SetProjectState;

    // Set this to false if you don't want to use permissions on this crud-model
    public const PERMISSIONS = true;

    protected $modelName = 'Project';
}
