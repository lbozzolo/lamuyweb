<?php

namespace Lamuy\Repositories;

use InfyOm\Generator\Common\BaseRepository;
use Lamuy\Models\Type;

class TypeRepository extends BaseRepository
{
    protected $fieldSearchable = [];

    public function model()
    {
        return Type::class;
    }
}
