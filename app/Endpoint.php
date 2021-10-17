<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Endpoint extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'endpoints';


    /**
     * Attributes of the table
     *
     */
    protected $fillable = [ 
        'name',
        'description',
        'permission_id'
    ];
}
