<?php

namespace LamuyWeb\Models;

use LamuyWeb\Models\Entity as Entity;
use LamuyWeb\Models\Noticia as Noticia;

/**
 * Class Category
 * @package LamuyWeb\Models
 * @version September 3, 2018, 10:55 pm UTC
 *
 * @property string name
 * @property string slug
 */
class Category extends Entity
{
    public $table = 'categories';

    public $fillable = [
        'name',
        'slug'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'slug' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

    public function noticias()
    {
        return $this->belongsToMany(Noticia::class, 'categories_noticias', 'category_id', 'noticia_id');
    }

    
}
