<?php

namespace App\Providers;

use App\Domain\GuestbookEntry\FakerProviders\GuestbookEntryIdFakerProvider;
use App\Domain\User\FakerProviders\UserIdFakerProvider;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->addFakerProviders();
    }

    private function addFakerProviders()
    {
        $faker = fake();
        $faker->addProvider(new UserIdFakerProvider($faker));
        $faker->addProvider(new GuestbookEntryIdFakerProvider($faker));
    }
}
