<?php

namespace LamuyWeb\Models;

use LamuyWeb\Models\Edition as Edition;
use LamuyWeb\Transformers\MagazineTransformer;

class Magazine extends Edition
{

    public $transformer = MagazineTransformer::class;

    public $apiAttributes = [
        'title',
        'description',
        'number',
        'date',
        'url_pdf',
        'url_cover',
    ];

}
