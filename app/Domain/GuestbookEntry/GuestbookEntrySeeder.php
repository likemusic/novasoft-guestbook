<?php

namespace App\Domain\GuestbookEntry;

use Illuminate\Database\Seeder;

class GuestbookEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GuestbookEntry::factory()->count(3)->create();
    }
}
