<?php

namespace App\Domain\GuestbookEntry;

use Illuminate\Database\Eloquent\Factories\Factory;

class GuestbookEntryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = fake();

        return [
            GuestbookEntryTableColumnNamesConstants::CONTENT => $faker->unique()->text(),
            GuestbookEntryTableColumnNamesConstants::USER_ID => $faker->unique()->userId(),
        ];
    }
}
