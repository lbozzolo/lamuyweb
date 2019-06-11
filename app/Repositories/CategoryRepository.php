<?php

namespace Lamuy\Repositories;

use Lamuy\Models\Category;
use InfyOm\Generator\Common\BaseRepository;

class CategoryRepository extends BaseRepository
{
    protected $fieldSearchable = [];

    public function model()
    {
        return Category::class;
    }
}
