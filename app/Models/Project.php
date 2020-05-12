<?php

namespace App\Models;

use App\Models\ProjectState;
use Illuminate\Database\Eloquent\Model;

use Fjord\Crud\Models\Traits\TrackEdits;
use Fjord\Crud\Models\Traits\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Project extends Model implements TranslatableContract
{
    use TrackEdits, Translatable;

    protected $fillable = [
        'employee_id',
        'completion_date',
        'budget',
        'project_states_id',
    ];

    public $translatedAttributes = ['title', 'description'];

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
        return $this->belongsTo(ProjectState::class, 'project_states_id');
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
        return $query->whereHas('status', function ($query) {
            $query->where('id', 1);
        });
    }
    public function scopeOffTrack($query)
    {
        return $query->whereHas('status', function ($query) {
            $query->where('title', 'off track');
        });
    }
    public function scopeOnHold($query)
    {
        return $query->whereHas('status', function ($query) {
            $query->where('title', 'on hold');
        });
    }
    public function scopeReady($query)
    {
        return $query->whereHas('status', function ($query) {
            $query->where('title', 'ready');
        });
    }
    public function scopeBlocked($query)
    {
        return $query->whereHas('status', function ($query) {
            $query->where('title', 'blocked');
        });
    }
    public function scopeFinished($query)
    {
        return $query->whereHas('status', function ($query) {
            $query->where('title', 'finished');
        });
    }
}
