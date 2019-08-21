<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    public function view(User $user)
    {
        if ($user->role == 'admin') {
            return true;
        } else {
            return false;
        }
    }

    public function adminCreate(User $user)
    {
        if ($user->role == 'admin') {
            return true;
        } else {
            return false;
        }
    } 

    public function adminShow(User $admin)
    {
        if ($admin->role == 'admin') {
            return true;
        } else {
            return false;
        }
    }

    public function adminView(User $user)
    {
        if ($user->role == 'admin') {
            return true;
        } else {
            return false;
        }
    } 

    public function adminUpdate(User $user)
    {
        if ($user->role == 'admin') {
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
        
    }
}
