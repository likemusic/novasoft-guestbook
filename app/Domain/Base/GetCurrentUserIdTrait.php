<?php

namespace App\Domain\Base;

use Illuminate\Support\Facades\Auth;

trait GetCurrentUserIdTrait
{
    protected function getCurrentUserId(): ?int
    {
        return Auth::id();
    }
}
