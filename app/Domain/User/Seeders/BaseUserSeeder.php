<?php

namespace App\Domain\User\Seeders;

use App\Domain\User\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

abstract class BaseUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory()->count(3)->create();

        $this->attachRoleToUsers($users);
    }

    private function attachRoleToUsers(Collection $users)
    {
        $role = $this->getRole();

        foreach ($users as $user) {
            $user->assignRole($role);
        }
    }

    abstract protected function getRole(): Role;
}
