<?php

namespace App\Domain\GuestbookEntry;

use App\Domain\Base\BasePermissionBasedPolicy;

class GuestbookEntryPolicy extends BasePermissionBasedPolicy
{
    protected function getPermissionEntityName(): string
    {
        return GuestbookEntry::PERMISSION_NAME;
    }
}
