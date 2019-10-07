<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Notification;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','DateofBirth','SEX','Tel','IDcardnumber','address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',

    ];
    protected $table = 'users';

    public function dogs()
    {
        return $this->hasMany('App\Dog');
    }
    public function posts()
    {
        return $this->hasMany('App\post');
    }


    const ADMIN_TYPE = 1;
    const DEFAULT_TYPE = 0;
    public function isAdmin(){
        return $this->type === self::ADMIN_TYPE;
    }
}

