<?php

namespace App\Domain\GuestbookEntry\Related\AdminResponse;

use Illuminate\Database\Seeder;

class AdminResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminResponse::factory()->count(3)->create();
    }
}
