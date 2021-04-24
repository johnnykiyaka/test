<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class MOVIES
 * @package App\Models
 * @version April 23, 2021, 5:24 pm UTC
 *
 * @property type $movie
 * @property start $movie
 * @property stops $movie
 */
class MOVIES extends Model
{
    use SoftDeletes;

    public $table = 'm_o_v_i_e_s';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'movie',
        'movie',
        'movie'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
