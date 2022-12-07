<?php

namespace App\Domain\User\RolesAndPermissions\Roles\Base;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

abstract class BaseRoleSeeder extends Seeder
{
    public function run()
    {
        $role = Role::create(['name' => $this->getRoleName()]);
        $permissionNames = $this->getPermissionNames();

        $this->attachPermissionsByNames($role, $permissionNames);
    }

    private function attachPermissionsByNames(Role $role, array $permissionNames)
    {
        $permissionIds = $this->getPermissionIdsByNames($permissionNames);
        $role->syncPermissions($permissionIds);
    }

    private function getPermissionIdsByNames(array $permissionNames): array
    {
        return Permission::whereIn('name', $permissionNames)->pluck('id')->toArray();
    }

    abstract protected function getRoleName(): string;

    protected function getPermissionNames(): array
    {
        $permissionsTree = $this->getPermissionsTree();

        $permissionNames = [];

        foreach ($permissionsTree as $entityName => $entityPermissionsNames) {
            foreach ($entityPermissionsNames as $entityPermissionName) {
                $permissionNames[] = "{$entityName}.{$entityPermissionName}";
            }
        }

        return $permissionNames;
    }
}
