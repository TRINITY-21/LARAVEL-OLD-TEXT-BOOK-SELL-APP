<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

// Models students within the system
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // A student can sell many books
    
    public function books(){
        return $this->hasMany('App\Book');
    }

    // A student can have many orders of books

    public function orders(){
        return $this->hasMany('App\Order');
    }

//    public function routeNotificationForNexmo($notifiable){
  //       return 0245050484;
//}
}
