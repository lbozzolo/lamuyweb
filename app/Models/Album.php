<?php

namespace Lamuy\Models;

use Lamuy\Models\Entity as Entity;

class Album extends Entity
{
    public $table = 'albums';

    public $fillable = [
        'title',
        'description',
    ];

    public static $rules = [
        'title' => 'required|max:255'
    ];

    public function noticias()
    {
        return $this->hasMany(Image::class);
    }

}