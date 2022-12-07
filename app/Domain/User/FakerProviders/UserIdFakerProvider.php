<?php

namespace App\Domain\User\FakerProviders;

use App\Domain\Base\FakerProviders\BaseModelIdFakerProvider;
use App\Domain\User\User;

class UserIdFakerProvider extends BaseModelIdFakerProvider
{
    protected function getModelClassName(): string
    {
        return User::class;
    }

    public function userId(): int
    {
        return $this->getNextValue();
    }
}
