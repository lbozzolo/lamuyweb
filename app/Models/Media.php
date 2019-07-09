<?php

namespace LamuyWeb\Models;

use LamuyWeb\Models\Entity as Entity;

/**
 * Class Category
 * @package LamuyWeb\Models
 * @version September 3, 2018, 10:55 pm UTC
 *
 * @property string name
 * @property string slug
 */
class Media extends Entity
{
    public $table = 'medias';

    public $fillable = ['type'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = ['type' => 'enum'];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'type' => 'required'
    ];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }


}
