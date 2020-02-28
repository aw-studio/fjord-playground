<?php

namespace App\Models;

use AwStudio\Fjord\Fjord\Models\Model as FjordModel;


class Project extends FjordModel
{
    // enter all fillable columns. translated columns must also
    // be set fillable. don't forget to also set them fillable in
    // the coresponding translation-model
    protected $fillable = [
        'title',
        'description',
        'employee_id',
        'completion_date',
        'budget',
        'project_status_id',
    ];



    /**
     * Relations
     *
     *
     */
    public function manager()
    {
        return $this->belongsTo('App\Models\Employee', 'employee_id');
    }
    public function staff()
    {
        return $this->belongsToMany('App\Models\Employee', 'staff', 'project_id', 'employee_id');
    }
    public function status()
    {
        return $this->belongsTo('App\Models\ProjectStatus', 'project_status_id');
    }

    /**
     * Scopes
     *
     *
     */
     public function scopeActive($query)
     {
         return $query->where('active', 1);
     }

     public function scopeOnTrack($query)
     {
         return $query->whereHas('status', function($query){
             $query->where('id', 1);
         });
     }
     public function scopeOffTrack($query)
     {
         return $query->whereHas('status', function($query){
             $query->where('title', 'off track');
         });
     }
     public function scopeOnHold($query)
     {
         return $query->whereHas('status', function($query){
             $query->where('title', 'on hold');
         });
     }
     public function scopeReady($query)
     {
         return $query->whereHas('status', function($query){
             $query->where('title', 'ready');
         });
     }
     public function scopeBlocked($query)
     {
         return $query->whereHas('status', function($query){
             $query->where('title', 'blocked');
         });
     }
     public function scopeFinished($query)
     {
         return $query->whereHas('status', function($query){
             $query->where('title', 'finished');
         });
     }
}
