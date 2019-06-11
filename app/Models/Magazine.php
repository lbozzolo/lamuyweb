<?php

namespace Lamuy\Models;

use Lamuy\Models\Edition as Edition;
use Lamuy\Transformers\MagazineTransformer;

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
