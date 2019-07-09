<?php

namespace LamuyWeb\Repositories;

use LamuyWeb\Models\Media;
use InfyOm\Generator\Common\BaseRepository;

class MediaRepository extends BaseRepository
{
    protected $fieldSearchable = [];

    public function model()
    {
        return Media::class;
    }
}
