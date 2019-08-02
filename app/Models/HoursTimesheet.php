<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HoursTimesheet extends Model
{

     protected $table = 'hourstimesheet';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'start_time', 'end_time',
    ];
}
