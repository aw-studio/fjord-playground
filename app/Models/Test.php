<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Fjord\Crud\Models\Traits\TrackEdits;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia as HasMediaContract;
use Fjord\Crud\Models\Traits\HasMedia;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Fjord\Crud\Models\Traits\Translatable;

class Test extends Model implements HasMediaContract, TranslatableContract
{
    use TrackEdits, HasMedia, Translatable;

    /**
     * Setup Model:
     *
     * Enter all fillable columns. Translated columns must also be set fillable. 
     * Don't forget to also set them fillable in the coresponding translation-model!
     */

    
    /**
     * Fillable attributes
     *
     * @var array
     */
    protected $fillable = ['title', 'text'];
    public $translatedAttributes = ['title', 'text'];
	protected $appends = ['image', 'translation'];
    protected $with = ['media', 'translations'];

    

    /**
     * Example image field.
     *
     */
    public function getImageAttribute()
    {
        return $this->getMedia('image');
    }

    /**
     * Register media conversions.
     *
     * @param Media $media
     * @return void
     */
    public function registerMediaConversions(Media $media = null)
    {
        foreach (config('fjord.mediaconversions.default') as $key => $value) {
            $this->addMediaConversion($key)
                  ->width($value[0])
                  ->height($value[1])
                  ->sharpen($value[2]);
        }
    }

    /**
     * Append the translation to each query.
     *
     * @return array
     */
    public function getTranslationAttribute()
    {
        return $this->getTranslationsArray();
    }

}
