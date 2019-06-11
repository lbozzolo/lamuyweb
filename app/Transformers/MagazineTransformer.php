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
            'title' => ($magazine->title)? (string)$magazine->title : null,
            'description' => ($magazine->description)? (string)$magazine->description : null,
            'number' => (int)$magazine->number,
            'date' => ($magazine->date)? (string)Carbon::parse($magazine->date)->format('m-Y') : null,
            'url_pdf' => ($magazine->url_pdf)? (string)url('storage/app/'.$magazine->url_pdf) : null,
            'url_cover' => ($magazine->url_cover)? (string)url('storage/app/covers/'.$magazine->url_cover) : null,
        ];
    }
}
