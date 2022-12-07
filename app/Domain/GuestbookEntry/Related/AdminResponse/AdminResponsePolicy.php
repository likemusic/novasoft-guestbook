<?php

namespace App\Domain\GuestbookEntry\Related\AdminResponse;

use App\Domain\Base\BasePermissionBasedPolicy;

class AdminResponsePolicy extends BasePermissionBasedPolicy
{
    protected function getPermissionEntityName(): string
    {
        return AdminResponse::PERMISSION_NAME;
    }
}
