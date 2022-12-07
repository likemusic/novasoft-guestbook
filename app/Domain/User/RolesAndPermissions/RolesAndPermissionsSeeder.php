<?php

namespace App\Domain\User\RolesAndPermissions;

use App\Domain\User\RolesAndPermissions\Permissions\PermissionsSeeder;
use App\Domain\User\RolesAndPermissions\Roles\RolesSeeder;
use Illuminate\Database\Seeder;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $this->call(PermissionsSeeder::class);
        $this->call(RolesSeeder::class);
    }
}
