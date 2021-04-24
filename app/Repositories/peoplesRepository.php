<?php

namespace App\Repositories;

use App\Models\peoples;
use App\Repositories\BaseRepository;

/**
 * Class peoplesRepository
 * @package App\Repositories
 * @version April 23, 2021, 6:23 pm UTC
*/

class peoplesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return peoples::class;
    }
}
