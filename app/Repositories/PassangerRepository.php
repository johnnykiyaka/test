<?php

namespace App\Repositories;

use App\Models\Passanger;
use App\Repositories\BaseRepository;

/**
 * Class PassangerRepository
 * @package App\Repositories
 * @version April 23, 2021, 5:07 pm UTC
*/

class PassangerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'movie',
        'movieStart',
        'movieEnds'
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
        return Passanger::class;
    }
}
