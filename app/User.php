<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email','admin', 'password','rating','badges','user_image'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function question(){
        return $this->hasMany('\App\Question');
    }

    public function notification(){
        return $this->hasMany('\App\Notification');
    }


    public function getUsername() {
        return $this->username;
    }
    public function getId()
    {
        return $this->id;
    }
}
