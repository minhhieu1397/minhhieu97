<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Admins;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function view(Admins $admin)
    {
        return true;
    } 

    public function adminUpdate(Admins $admin)
    {
        if ($admin->level == '1') {
            return true;
        } else {
            return false;
        }
    }

    public function adminCreate(Admins $admin)
    {
        if ($admin->level == '1') {
            return true;
        } else {
            return false;
        }
    } 

    public function adminShow(Admins $admin)
    {
        if ($admin->level == '1' || $admin->level == "2") {
            return true;
        } else {
            return false;
        }
    }
}
