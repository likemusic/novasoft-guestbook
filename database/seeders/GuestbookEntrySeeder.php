<?php

namespace Database\Seeders;

use App\Domain\Guestbook\GuestbookEntry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
