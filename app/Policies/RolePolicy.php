<?php


// app/Policies/RolePolicy.php
namespace App\Policies;

use App\Models\User;
use App\Models\Role;
use Illuminate\Auth\Access\Response;
// use Spatie\Permission\Models\Role;

class RolePolicy
{
    public function delete( User $user,Role $role): Response
    {
        if (! $user->can('delete roles')) {
            return Response::deny('You do not have permission to delete roles.');
        }

        if ($role->name === 'root') {
            return Response::deny('You cannot delete the root role.');
        }

        // if (User::role()->exists()) {
        //     return Response::deny('The role is assigned to users, please remove it from them first.');
        // }

        return Response::allow();
    }
}