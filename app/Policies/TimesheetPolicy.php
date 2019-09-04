<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Timesheets;
use Illuminate\Auth\Access\HandlesAuthorization;

class TimesheetPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Timesheets $timesheet)
    {
        return $user->id == $timesheet->user_id;
    }

    public function create(User $user)
    {
        return $user->id > 0;
    }

    public function update(User $user, Timesheets $timesheet)
    {
        return $user->id === $timesheet->user_id;
    }

    public function delete(User $user, Timesheets $timesheet)
    {
        return $user->id == $timesheet->user_id;
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
