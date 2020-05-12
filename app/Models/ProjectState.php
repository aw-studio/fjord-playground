<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Fjord\Crud\Models\Traits\TrackEdits;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Fjord\Crud\Models\Traits\Translatable;

class ProjectState extends Model implements TranslatableContract
{
    use TrackEdits, Translatable;

    protected $fillable = [];

    public $translatedAttributes = ['title'];
}
