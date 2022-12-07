<?php

namespace App\Domain\Base;

interface BaseCrudActionNamesInterface
{
    const CREATE = 'create';
    const UPDATE = 'update';
    const DELETE = 'delete';
    const LIST = 'list';
    const SHOW = 'show';
}
