<?php

namespace LamuyWeb\Transformers;

use Carbon\Carbon;
use LamuyWeb\Models\Magazine;
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
            'url_pdf' => ($magazine->url_pdf)? (string)url('pdf/'.$magazine->url_pdf) : null,
            'url_cover' => ($magazine->url_cover)? (string)url('covers/'.$magazine->url_cover) : null,
        ];
    }
}
