<?php

namespace App\Models;

use Spatie\MediaLibrary\Models\Media;
use Illuminate\Database\Eloquent\Model;

use Fjord\Crud\Models\Traits\TrackEdits;

use Fjord\Crud\Models\Traits\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMedia as HasMediaContract;

class Employee extends Model implements HasMediaContract
{
    use TrackEdits, HasMedia;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'department_id'
    ];

    protected $appends = [
        'image',
        'fullName'
    ];

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }
    public function projects()
    {
        return $this->belongsToMany('App\Models\Project', 'staff');
    }

    /**
     * Accessors
     *
     *
     */
    public function getImageAttribute()
    {
        return $this->getMedia('image')->first();
    }
    public function getFullNameAttribute()
    {
        return "{$this->last_name}, {$this->first_name} ";
    }

    /**
     * Scopes
     *
     *
     */
    public function scopeDevelopment($query)
    {
        return $query->where('department_id', 1);
    }
    public function scopeMarketing($query)
    {
        return $query->where('department_id', 2);
    }
    public function scopeProjectManagement($query)
    {
        return $query->where('department_id', 3);
    }
    public function scopeSales($query)
    {
        return $query->where('department_id', 4);
    }
    public function scopeHumanResources($query)
    {
        return $query->where('department_id', 5);
    }

    public function registerMediaConversions(Media $media = null)
    {
        foreach (config('fjord.mediaconversions.default') as $key => $value) {
            $this->addMediaConversion($key)
                ->width($value[0])
                ->height($value[1])
                ->sharpen($value[2]);
        }
    }
}
