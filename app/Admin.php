<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticable
{
    use Notifiable;

    protected $guard = 'admin';

    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'username', 'password'
    ];

    protected $hidden = ['password'];
}
