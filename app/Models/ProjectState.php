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

    protected $appends = ['translation'];

    public $translatedAttributes = ['title'];

    public function setTranslationAttribute()
    {
        $translation = [];
        foreach ($this->translations as $t) {
            $translation[$t->locale] = $t;
        }
        return $translation;
    }
}
