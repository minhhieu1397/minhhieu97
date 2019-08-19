<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Timesheets;
use Illuminate\Auth\Access\HandlesAuthorization;

class TimesheetPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->role == 'admin') {
            return true;
        }
    }

    public function view(User $user, Timesheets $timesheet)
    {
        if ($user->id == $timesheet->user_id) {
            return true;
        } else {
            return false;
        }
    }

    public function update(User $user, Timesheets $timesheet)
    {
        if ($user->id == $timesheet->user_id) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
}
