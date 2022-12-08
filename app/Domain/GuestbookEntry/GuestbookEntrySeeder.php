<?php

namespace App\Domain\GuestbookEntry;

use App\Domain\Base\BaseSeeder;

class GuestbookEntrySeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GuestbookEntry::factory()->count($this->getItemsCount())->create();
    }
}
