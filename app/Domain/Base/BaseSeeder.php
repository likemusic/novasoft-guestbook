<?php

namespace App\Domain\Base;

use Illuminate\Database\Seeder;

class BaseSeeder extends Seeder
{
    protected int $itemsCount;

    public function __construct()
    {
        $this->itemsCount = config('database.seeders_count', 3);
    }

    protected function getItemsCount()
    {
        return $this->itemsCount;
    }
}
