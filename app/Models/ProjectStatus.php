<?php

namespace App\Models;

use AwStudio\Fjord\Fjord\Models\Model as FjordModel;

class ProjectStatus extends FjordModel
{
    // enter all fillable columns. translated columns must also
    // be set fillable. don't forget to also set them fillable in
    // the coresponding translation-model
    protected $fillable = ['title'];

}
