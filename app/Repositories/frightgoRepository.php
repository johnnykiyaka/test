<?php

namespace App\Repositories;

use App\Models\frightgo;
use App\Repositories\BaseRepository;

/**
 * Class frightgoRepository
 * @package App\Repositories
 * @version April 23, 2021, 5:23 pm UTC
*/

class frightgoRepository extends BaseRepository
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
        return frightgo::class;
    }
}
