<?php

namespace App\Domain\User\RolesAndPermissions\Permissions;

use App\Domain\GuestbookEntry\GuestbookEntry;
use App\Domain\GuestbookEntry\GuestbookEntryActionNamesInterface;
use App\Domain\GuestbookEntry\Related\AdminResponse\AdminResponse;
use App\Domain\GuestbookEntry\Related\AdminResponse\AdminResponseActionNamesInterface;
use Illuminate\Database\Seeder;
use ReflectionClass;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        $permissionNames = [
            GuestbookEntry::PERMISSION_NAME => GuestbookEntryActionNamesInterface::class,
            AdminResponse::PERMISSION_NAME => AdminResponseActionNamesInterface::class,
        ];

        foreach ($permissionNames as $entityName => $actionNamesClassNames) {
            $actionNames = $this->getClassConstants($actionNamesClassNames);

            foreach ($actionNames as $actionName) {
                Permission::create(['name' => "{$entityName}.{$actionName}"]);
            }
        }
    }

    private function getClassConstants(string $className): array
    {
        $reflectionClass = new ReflectionClass($className);

        return $reflectionClass->getConstants();
    }
}
