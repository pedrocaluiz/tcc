<?php

namespace App\Policies;

use App\User;
use App\Home;
use Illuminate\Auth\Access\HandlesAuthorization;


class HomePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the home.
     *
     * @param \App\User $user
     * @param \App\Home $home
     * @return mixed
     */
    public function view(User $user)
    {
        return false;
    }
}
