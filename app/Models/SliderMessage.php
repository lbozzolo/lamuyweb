<?php

namespace LamuyWeb\Models;

use LamuyWeb\Models\Entity as Entity;

class SliderMessage extends Entity
{

    public $table = 'slider_images_messages';
    public $timestamps = false;

    public $fillable = [
        'image_id', 'slider_id', 'main_text', 'secondary_text',
    ];

}
