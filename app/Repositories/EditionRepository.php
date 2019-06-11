<?php

namespace Lamuy\Repositories;

use Lamuy\Models\Edition;
use InfyOm\Generator\Common\BaseRepository;

class EditionRepository extends BaseRepository
{
    protected $fieldSearchable = [
        
    ];

    public function model()
    {
        return Edition::class;
    }
}
