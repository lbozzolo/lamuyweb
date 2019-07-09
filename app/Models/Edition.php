<?php

namespace LamuyWeb\Models;

use Carbon\Carbon;
use LamuyWeb\Models\Entity as Entity;

class Edition extends Entity
{
    public $table = 'editions';
    public $image_croppie_width = 960;
    public $image_croppie_height = 720;

    public $fillable = [
        'title',
        'number',
        'date',
        'url_pdf',
        'url_cover',
        'description',
        'type',
        'active'
    ];

    protected $casts = [
        'title' => 'string',
        'description' => 'string',
    ];

    public static $rules = [
        'title' => 'required',
        'number' => 'required',
    ];

    public function getDateFormattedAttribute()
    {
        //return date_format($this->attributes['date'], 'd/m/Y');
        return Carbon::parse($this->attributes['date'])->format('m-Y');
    }

}
