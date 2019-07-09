<?php

namespace LamuyWeb\Repositories;

use LamuyWeb\Models\Gallery;
use InfyOm\Generator\Common\BaseRepository;

class GalleryRepository extends BaseRepository
{
    protected $fieldSearchable = [

    ];

    public function model()
    {
        return Gallery::class;
    }

    public function activate($gallery, $galleries)
    {
        $filtered = $galleries->filter(function ($item) use ($gallery) {
            return $item->id != $gallery->id;
        });

        if ( $gallery->active) {

            $gallery->active = null;

        } else {

            $gallery->active = 1;
            foreach($filtered as $gal){
                $gal->active = null;
                $gal->save();
            }

        }

        $gallery->save();

        return $gallery;
    }

}
