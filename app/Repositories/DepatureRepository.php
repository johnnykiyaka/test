<?php

namespace App\Repositories;

use App\Models\Depature;
use App\Repositories\BaseRepository;

/**
 * Class DepatureRepository
 * @package App\Repositories
 * @version April 23, 2021, 5:19 pm UTC
*/

class DepatureRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'movie',
        'movie',
        'movie'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Depature::class;
    }
}
