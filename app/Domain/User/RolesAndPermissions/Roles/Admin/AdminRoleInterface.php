<?php

namespace App\Domain\User\RolesAndPermissions\Roles\Admin;

use App\Domain\GuestbookEntry\GuestbookEntry;
use App\Domain\GuestbookEntry\GuestbookEntryActionNamesInterface;
use App\Domain\GuestbookEntry\Related\AdminResponse\AdminResponse;
use App\Domain\GuestbookEntry\Related\AdminResponse\AdminResponseActionNamesInterface;

interface AdminRoleInterface
{
    const NAME = 'admin';

    const PERMISSIONS = [
        AdminResponse::PERMISSION_NAME => [
            AdminResponseActionNamesInterface::CREATE,
            AdminResponseActionNamesInterface::UPDATE,
            AdminResponseActionNamesInterface::DELETE,
            AdminResponseActionNamesInterface::LIST,
            AdminResponseActionNamesInterface::SHOW,
        ],

        GuestbookEntry::PERMISSION_NAME => [
            GuestbookEntryActionNamesInterface::LIST,
            GuestbookEntryActionNamesInterface::SHOW,
            GuestbookEntryActionNamesInterface::UPDATE,
            GuestbookEntryActionNamesInterface::DELETE,
        ],
    ];
}
