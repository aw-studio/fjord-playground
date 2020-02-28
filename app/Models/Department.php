<?php

namespace App\Models;

use AwStudio\Fjord\Fjord\Models\Model as FjordModel;

class Department extends FjordModel
{
    // enter all fillable columns. translated columns must also
    // be set fillable. don't forget to also set them fillable in
    // the coresponding translation-model
    protected $fillable = ['name'];

    protected $appends= ['employees_count'];


    public function getEmployeesCountAttribute()
    {
        return $this->employees()->count();
    }

    /**
     * Relations
     *
     *
     */
    public function employees()
    {
        return $this->hasMany('App\Models\Employee');
    }
}
