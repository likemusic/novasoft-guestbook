<?php

namespace App\Domain\User\RolesAndPermissions\Roles\User;

use App\Domain\User\RolesAndPermissions\Roles\Base\BaseRoleSeeder;

class UserRoleSeeder extends BaseRoleSeeder
{
    protected function getRoleName(): string
    {
        return UserRoleInterface::NAME;
    }

    protected function getPermissionsTree(): array
    {
        return UserRoleInterface::PERMISSIONS;
    }

}
