<?php

namespace LamuyWeb\Models;

use Eloquent as Model;

/**
 * Class Image
 * @package LamuyWeb\Models
 * @version September 3, 2018, 10:53 pm UTC
 *
 * @property string path
 * @property string title
 * @property integer imageable_id
 * @property string imageable_type
 * @property integer main
 */
class Image extends Model
{
    public $table = 'images';

    public $fillable = [
        'path',
        'title',
        'thumb_id',
        'imageable_id',
        'imageable_type',
        'main',
        'type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'path' => 'string',
        'title' => 'string',
        'imageable_id' => 'integer',
        'imageable_type' => 'string',
        'main' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function pathIsThumb()
    {
        return starts_with($this->attributes['path'], 'thumb');
    }

    public function getTitleAttribute()
    {
        return ($this->attributes['title'])? $this->attributes['title'] : 'Imagen de muestra';
    }

    public function getThumbPathAttribute()
    {
        return 'thumb-'.$this->attributes['path'];
    }

    public function scopeBigs()
    {
        return $this->where('thumbnail_id', '!=', null);
    }

    public function scopeThumbs()
    {
        return $this->where('thumbnail_id', null);
    }

    public function scopeGalleryType()
    {
        return $this->where('type', 1);
    }

    public function imageable()
    {
        return $this->morphTo();
    }

    public function texts()
    {
        return $this->belongsToMany(Slider::class, 'slider_images_messages')->withPivot('main_text', 'secondary_text');
    }

    
}
