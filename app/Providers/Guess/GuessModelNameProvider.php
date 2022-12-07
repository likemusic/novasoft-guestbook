<?php

namespace App\Providers\Guess;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\ServiceProvider;

class GuessModelNameProvider extends ServiceProvider
{
    public function register()
    {
        Factory::guessModelNamesUsing(function (Factory $factory) {
            $factoryClassName = get_class($factory);

            return substr($factoryClassName, 0, -7); // 7 - str_len("Factory")
        });
    }
}
