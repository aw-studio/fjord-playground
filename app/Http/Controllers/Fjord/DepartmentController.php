<?php

namespace App\Http\Controllers\Fjord;

use Fjord\Form\Controllers\CrudController;
use Fjord\Form\Controllers\Traits\CrudIndexDeleteAll;
use Fjord\Form\Controllers\Traits\CrudShowForm;
use Fjord\Form\Controllers\Traits\CrudShowPreview;

class DepartmentController extends CrudController
{
    use CrudIndexDeleteAll,
        CrudShowForm,
        CrudShowPreview;

    // Set this to false if you don't want to use permissions on this crud-model
    public const PERMISSIONS = true;

    protected $modelName = 'Department';
}
