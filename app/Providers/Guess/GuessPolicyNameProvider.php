<?php

namespace App\Providers\Guess;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class GuessPolicyNameProvider extends ServiceProvider
{
    public function boot()
    {
        Gate::guessPolicyNamesUsing(function ($modelClass) {
            return "{$modelClass}Policy";
        });
    }
}
