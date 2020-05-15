<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Fjord\Crud\Models\Traits\TrackEdits;

class ProjectState extends Model
{
    use TrackEdits;

    protected $fillable = ['title'];

    protected $appends = [];
}
