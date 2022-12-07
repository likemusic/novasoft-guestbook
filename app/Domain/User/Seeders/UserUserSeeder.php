<?php

namespace App\Domain\User\Seeders;

use App\Domain\User\RolesAndPermissions\Roles\User\UserRoleInterface;
use Spatie\Permission\Models\Role;

class UserUserSeeder extends BaseUserSeeder
{
    protected function getRole(): Role
    {
        return Role::findByName(UserRoleInterface::NAME);
    }
}
