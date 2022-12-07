<?php

namespace App\Domain\Base\FakerProviders;

use Faker\Provider\Base;

abstract class BaseModelIdFakerProvider extends Base
{
    protected function getListValues(): array
    {
        $modelClassName = $this->getModelClassName();

        return $modelClassName::pluck('id')->toArray();
    }

    abstract protected function getModelClassName(): string;

    protected function getNextValue(): mixed
    {
        $values = $this->getListValues();

        if (!$values) {
            return null;
        }

        return $values[array_rand($values)];
    }
}
