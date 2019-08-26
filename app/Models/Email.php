<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $table = 'email';

    public function emailnotifications()
    {
        return $this->belongsToMany('App\Models\EmailNotification');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
    ];
}
