<?php

namespace LamuyWeb\Repositories;

use InfyOm\Generator\Common\BaseRepository;
use LamuyWeb\Models\Type;

class TypeRepository extends BaseRepository
{
    protected $fieldSearchable = [];

    public function model()
    {
        return Type::class;
    }
}
