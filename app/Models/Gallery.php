<?php

namespace LamuyWeb\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use LamuyWeb\Models\Entity as Entity;

class Gallery extends Entity
{
    public $table = 'galleries';

    public $image_croppie_width = 960;
    public $image_croppie_height = 720;

    protected $dates = ['deleted_at'];

    use SoftDeletes;

    public $fillable = [
        'name',
    ];

    public static $rules = [
        'name' => 'required|max:255',
    ];

    // Relationships

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function scopeActive()
    {
        return $this->where('active', '=', 1);
    }

}
