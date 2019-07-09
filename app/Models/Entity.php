<?php

namespace LamuyWeb\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model as Model;
use LamuyWeb\Models\Image as Image;

class Entity extends Model
{

    public function getFechaCreadoAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('d-m-Y');
    }

    public function getFechaEditadoAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])->format('d-m-Y');
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function mainImage()
    {
        return $this->images()->where('main', 1)->first();
    }

    public function mainImageThumb()
    {
        return ($this->imagesThumb()->where('main', 1)->first())? $this->imagesThumb()->where('main', 1)->first() : $this->imagesThumb->first();
    }

    public function imagesThumb()
    {
        return $this->morphMany(Image::class, 'imageable')->where('thumbnail_id', null);
    }

    public function imagesBig()
    {
        return $this->morphMany(Image::class, 'imageable')->where('thumbnail_id', '!=', null);
    }

}
