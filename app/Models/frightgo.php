<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class frightgo
 * @package App\Models
 * @version April 23, 2021, 5:23 pm UTC
 *
 * @property type $movie
 * @property start $movie
 * @property stops $movie
 */
class frightgo extends Model
{
    use SoftDeletes;

    public $table = 'frightgos';
    

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
