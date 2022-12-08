<?php

namespace App\Domain\GuestbookEntry\Related\AdminResponse;

use App\Domain\Base\BaseSeeder;

class AdminResponseSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminResponse::factory()->count($this->getItemsCount())->create();
    }
}
