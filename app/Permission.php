<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use SoftDeletes;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permissions';


    /**
     * Attributes of the table
     *
     */
    protected $fillable = [ 
        'name',
        'description',
    ];

    public function roles() {
        return $this->belongsToMany('App\Role');
    }
}
