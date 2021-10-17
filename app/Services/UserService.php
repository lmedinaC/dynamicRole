<?php

namespace App\Services;

use App\User;

class UserService 
{
    protected $model_class = User::class;

    public $model;
    
    public function __construct()
    {
        $this->model = new $this->model_class;
    }

    public function store($attributes)
    {
        $attributes['password'] = bcrypt($attributes['password']);

        $user = $this->model->newInstance($attributes);

        $user->save();

        return $user;
    }
}