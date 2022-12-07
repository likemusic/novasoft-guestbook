<?php

namespace App\Domain\User\Seeders;

use App\Domain\User\RolesAndPermissions\Roles\Admin\AdminRoleInterface;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends BaseUserSeeder
{
    protected function getRole(): Role
    {
        return Role::findByName(AdminRoleInterface::NAME);
    }
}
