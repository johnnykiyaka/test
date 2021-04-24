<?php

namespace App\Repositories;

use App\Models\MOVIES;
use App\Repositories\BaseRepository;

/**
 * Class MOVIESRepository
 * @package App\Repositories
 * @version April 23, 2021, 5:24 pm UTC
*/

class MOVIESRepository extends BaseRepository
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
        return MOVIES::class;
    }
}
