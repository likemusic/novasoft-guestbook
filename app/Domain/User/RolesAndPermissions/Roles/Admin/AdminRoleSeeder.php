<?php

namespace App\Domain\User\RolesAndPermissions\Roles\Admin;

use App\Domain\User\RolesAndPermissions\Roles\Base\BaseRoleSeeder;

class AdminRoleSeeder extends BaseRoleSeeder
{
    protected function getRoleName(): string
    {
        return AdminRoleInterface::NAME;
    }

    protected function getPermissionsTree(): array
    {
        return AdminRoleInterface::PERMISSIONS;
    }
}
