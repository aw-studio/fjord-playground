<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;
use Fjord\Crud\Models\Traits\Sluggable;

class ProjectStateTranslation extends Model
{
    /**
     * Timestamps
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Fillable attributes.
     *
     * @var array
     */
    protected $fillable = ['title'];
}
