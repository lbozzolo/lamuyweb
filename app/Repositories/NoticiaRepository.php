<?php

namespace Lamuy\Repositories;

use InfyOm\Generator\Common\BaseRepository;
use Lamuy\Models\Noticia;

class NoticiaRepository extends BaseRepository
{
    protected $fieldSearchable = [];

    public function model()
    {
        return Noticia::class;
    }
}
