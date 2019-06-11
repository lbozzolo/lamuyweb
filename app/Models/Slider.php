<?php

namespace Lamuy\Models;

use Lamuy\Models\Entity as Entity;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Slider
 * @package Lamuy\Models
 * @version September 6, 2018, 11:58 am UTC
 *
 * @property string name
 */
class Slider extends Entity
{
    use SoftDeletes;

    public $table = 'sliders';
    public $image_croppie_width = 1200;
    public $image_croppie_height = 600;

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name', 'text', 'secondary_text', 'active', 'text_active',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];

}
