<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;
use Fjord\Crud\Models\Traits\Sluggable;
use Illuminate\Database\Eloquent\Builder;

class ProjectTranslation extends Model
{
    use Sluggable;

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
    protected $fillable = ['title', 'description'];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * Unique by title + locale.
     *
     * @param Builder $query
     * @param mixed $model
     * @param mixed $attribute
     * @param array $config
     * @param string $slug
     * @return Builder
     */
    public function scopeWithUniqueSlugConstraints(Builder $query, $model, $attribute, $config, $slug)
    {
        return $query->where('locale', $model->locale);
    }
}
