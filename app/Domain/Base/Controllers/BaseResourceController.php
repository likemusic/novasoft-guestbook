<?php

namespace App\Domain\Base\Controllers;

abstract class BaseResourceController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource($this->getModelClassName(), $this->getModelIdRouteParameterName());
    }

    abstract protected function getModelClassName(): string;

    abstract protected function getModelIdRouteParameterName(): string;
}
