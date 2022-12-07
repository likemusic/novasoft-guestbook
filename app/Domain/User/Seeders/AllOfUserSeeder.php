<?php

namespace App\Domain\User\Seeders;

use Illuminate\Database\Seeder;

class AllOfUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminUserSeeder::class);
        $this->call(UserUserSeeder::class);
    }
}
