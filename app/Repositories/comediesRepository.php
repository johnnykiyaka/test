<?php

namespace App\Repositories;

use App\Models\comedies;
use App\Repositories\BaseRepository;

/**
 * Class comediesRepository
 * @package App\Repositories
 * @version April 23, 2021, 5:53 pm UTC
*/

class comediesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'type',
        'comedystart',
        'comedyEnd'
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
        return comedies::class;
    }
}
