<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Domain\GuestbookEntry\GuestbookEntrySeeder;
use App\Domain\GuestbookEntry\Related\AdminResponse\AdminResponseSeeder;
use App\Domain\User\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(GuestbookEntrySeeder::class);
        $this->call(AdminResponseSeeder::class);
    }
}
