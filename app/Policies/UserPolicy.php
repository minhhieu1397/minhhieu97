<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->role == 'admin') {
            return true;
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

    public function adminCreate(User $user)
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
        //
    }
}
