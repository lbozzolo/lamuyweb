<?php

namespace LamuyWeb\Models;

use LamuyWeb\Models\Entity as Entity;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Slider
 * @package LamuyWeb\Models
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

    public function scopeActive()
    {
        return $this->where('active', '=', 1);
    }

    public function texts()
    {
        return $this->belongsToMany(Image::class, 'slider_images_messages')->withPivot('main_text', 'secondary_text');
    }

}
