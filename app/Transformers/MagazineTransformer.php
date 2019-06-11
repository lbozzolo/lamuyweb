<?php

namespace Lamuy\Transformers;

use Carbon\Carbon;
use Lamuy\Models\Magazine;
use League\Fractal\TransformerAbstract;

class MagazineTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Magazine $magazine)
    {
        return [
            'title' => (string)$magazine->title,
            'description' => (string)$magazine->description,
            'number' => (int)$magazine->number,
            'date' => ($magazine->date)? (string)Carbon::parse($magazine->date)->format('m-Y') : null,
            'url_pdf' => (string)storage_path('app/'.$magazine->url_pdf),
            'url_cover' => (string)storage_path('app/covers/'.$magazine->url_cover),
        ];
    }
}
