<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Fjord\Crud\Models\Traits\TrackEdits;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia as HasMediaContract;
use Fjord\Crud\Models\Traits\HasMedia;

class Developer extends Model implements HasMediaContract
{
    use TrackEdits, HasMedia;

    /**
     * Fillable attributes
     *
     * @var array
     */
    protected $fillable = ['name', 'task', 'twitter'];

    /**
     * Attribuets to be appended.
     *
     * @var array
     */
    protected $appends = ['image'];

    /**
     * Eager loads.
     *
     * @var array
     */
    protected $with = ['media'];

    public function getImageAttribute()
    {
        return $this->getMedia('image')->first();
    }

    public function scopeDesign($query)
    {
        return $query->where('task', 'design');
    }

    public function scopeDevelopment($query)
    {
        return $query->where('task', 'development');
    }
}
