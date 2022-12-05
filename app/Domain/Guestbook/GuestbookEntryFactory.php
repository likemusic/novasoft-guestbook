<?php

namespace App\Domain\Guestbook;

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
        return [
            GuestbookEntryTableColumnNamesConstants::CONTENT => fake()->unique()->text(),
        ];
    }
}
