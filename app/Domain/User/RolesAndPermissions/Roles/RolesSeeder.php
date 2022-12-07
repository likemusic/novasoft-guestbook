<?php

namespace App\Domain\User\RolesAndPermissions\Roles;

use App\Domain\User\RolesAndPermissions\Roles\Admin\AdminRoleSeeder;
use App\Domain\User\RolesAndPermissions\Roles\User\UserRoleSeeder;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    public function run()
    {
        $this->call(AdminRoleSeeder::class);
        $this->call(UserRoleSeeder::class);
    }
}
