<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admins extends Authenticatable
{
	use Notifiable;

    protected $table = 'admins';

    protected $fillable = [
        'name', 'email', 'password', 'level', 'avatar',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
