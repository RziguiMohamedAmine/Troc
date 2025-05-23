<?php

namespace App\Policies;

use App\Models\User;

class AdminPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }


    public function admin(User $user)
    {
        return $user->hasRole('admin'); // Assuming you use roles and have a 'admin' role
    }
}
