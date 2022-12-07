<?php

namespace App\Domain\GuestbookEntry\Related\AdminResponse;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Domain\GuestbookEntry\Related\AdminResponse\AdminResponse>
 */
class AdminResponseFactory extends Factory
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
            AdminResponseTableColumnNamesConstants::CONTENT => $faker->unique()->text(),
            AdminResponseTableColumnNamesConstants::GUESTBOOK_ENTRY_ID => $faker->guestbookEntryId(),
            AdminResponseTableColumnNamesConstants::USER_ID => $faker->userId(),
        ];
    }
}
