<?php

namespace LamuyWeb\Repositories;

use InfyOm\Generator\Common\BaseRepository;
use LamuyWeb\Models\Comment;

class CommentRepository extends BaseRepository
{
    protected $fieldSearchable = [];

    public function model()
    {
        return Comment::class;
    }
}
