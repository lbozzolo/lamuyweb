<?php

namespace Lamuy\Repositories;

use Lamuy\Models\Advertisment;
use InfyOm\Generator\Common\BaseRepository;

class AdvertismentRepository extends BaseRepository
{
    protected $fieldSearchable = [];

    public function model()
    {
        return Advertisment::class;
    }
}
