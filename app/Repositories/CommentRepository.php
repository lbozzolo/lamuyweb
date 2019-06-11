<?php

namespace Lamuy\Repositories;

use InfyOm\Generator\Common\BaseRepository;
use Lamuy\Models\Comment;

class CommentRepository extends BaseRepository
{
    protected $fieldSearchable = [];

    public function model()
    {
        return Comment::class;
    }
}
