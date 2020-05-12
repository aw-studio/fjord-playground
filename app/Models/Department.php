<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Fjord\Crud\Models\Traits\TrackEdits;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Fjord\Crud\Models\Traits\Translatable;

class Department extends Model implements TranslatableContract
{
    use TrackEdits, Translatable;

    protected $fillable = [];

    protected $appends = ['employees_count'];

    public $translatedAttributes = ['name'];

    public function getEmployeesCountAttribute()
    {
        return $this->employees()->count();
    }

    public function employees()
    {
        return $this->hasMany('App\Models\Employee');
    }
}
