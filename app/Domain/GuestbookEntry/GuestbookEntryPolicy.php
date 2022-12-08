<?php

namespace App\Domain\GuestbookEntry;

use App\Domain\Base\BasePermissionBasedPolicy;
use App\Domain\User\User;
use Illuminate\Database\Eloquent\Model;

class GuestbookEntryPolicy extends BasePermissionBasedPolicy
{
    protected function getPermissionEntityName(): string
    {
        return GuestbookEntry::PERMISSION_NAME;
    }

    public function viewAny(?User $user)
    {
        return true;
    }

    public function view(?User $user, Model $model)
    {
        return true;
    }
}
