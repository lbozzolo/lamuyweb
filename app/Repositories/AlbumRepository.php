<?php

namespace Lamuy\Repositories;

use Lamuy\Models\Album;
use InfyOm\Generator\Common\BaseRepository;

class AlbumRepository extends BaseRepository
{
    protected $fieldSearchable = [];

    public function model()
    {
        return Album::class;
    }
}
