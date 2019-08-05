<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timesheets extends Model
{
    protected $table = ('timesheets');

    protected $fillable = [
    	'name', 'user_id', 'name', 'work_date', 'start_time', 'end_time', 'details', 'approve', 'late_flg',
    ];
}
