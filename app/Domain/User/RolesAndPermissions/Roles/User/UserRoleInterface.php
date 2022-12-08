<?php

namespace App\Domain\User\RolesAndPermissions\Roles\User;

use App\Domain\GuestbookEntry\GuestbookEntry;
use App\Domain\GuestbookEntry\GuestbookEntryActionNamesInterface;

interface UserRoleInterface
{
    const NAME = 'user';

    const PERMISSIONS = [
        GuestbookEntry::PERMISSION_NAME => [
            GuestbookEntryActionNamesInterface::CREATE,
            GuestbookEntryActionNamesInterface::UPDATE,
            GuestbookEntryActionNamesInterface::INDEX,
            GuestbookEntryActionNamesInterface::SHOW,
        ]
    ];
}
