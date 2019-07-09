<?php

namespace LamuyWeb\Repositories;

use LamuyWeb\Models\Advertisment;
use InfyOm\Generator\Common\BaseRepository;

class AdvertismentRepository extends BaseRepository
{
    protected $fieldSearchable = [];

    public function model()
    {
        return Advertisment::class;
    }
}
