<?php

namespace App\Providers\Guess;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\ServiceProvider;

class GuessFactoryNameProvider extends ServiceProvider
{
    public function register()
    {
        Factory::guessFactoryNamesUsing(function (string $modelName) {
            return "{$modelName}Factory";
        });
    }
}
