<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Passanger
 * @package App\Models
 * @version April 23, 2021, 5:07 pm UTC
 *
 * @property string $movie
 * @property string $movieStart
 * @property string $movieEnds
 */
class Passanger extends Model
{
    use SoftDeletes;

    public $table = 'passangers';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'movie',
        'movieStart',
        'movieEnds'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'movie' => 'string',
        'movieStart' => 'date',
        'movieEnds' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
