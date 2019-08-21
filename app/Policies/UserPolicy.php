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
    
    public function userUpdate(User $user, User $user_edit)
    {
        if ($user->id == $user_edit->id) {
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
