<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class comedies
 * @package App\Models
 * @version April 23, 2021, 5:53 pm UTC
 *
 * @property string $type
 * @property string $comedystart
 * @property string $comedyEnd
 */
class comedies extends Model
{
    use SoftDeletes;

    public $table = 'comedies';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'type',
        'comedystart',
        'comedyEnd'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'type' => 'string',
        'comedystart' => 'date',
        'comedyEnd' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
