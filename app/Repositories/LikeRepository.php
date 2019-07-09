<?php

namespace LamuyWeb\Repositories;

use InfyOm\Generator\Common\BaseRepository;
use LamuyWeb\Models\Like;

class LikeRepository extends BaseRepository
{
    protected $fieldSearchable = [];

    public function model()
    {
        return Like::class;
    }
}
