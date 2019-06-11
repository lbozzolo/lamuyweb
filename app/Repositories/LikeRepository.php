<?php

namespace Lamuy\Repositories;

use InfyOm\Generator\Common\BaseRepository;
use Lamuy\Models\Like;

class LikeRepository extends BaseRepository
{
    protected $fieldSearchable = [];

    public function model()
    {
        return Like::class;
    }
}
