<?php

namespace App\Domain\Base;

interface BaseCrudActionNamesInterface
{
    const CREATE = 'create';
    const UPDATE = 'update';
    const DELETE = 'delete';
    const INDEX = 'index';
    const SHOW = 'show';
}
