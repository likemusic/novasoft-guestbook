<?php

namespace App\Domain\Base;

use App\Domain\GuestbookEntry\Related\AdminResponse\AdminResponse;
use App\Domain\User\User;
use Illuminate\Auth\Access\HandlesAuthorization;

abstract class BasePermissionBasedPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param \App\Domain\User\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $this->can($user, __FUNCTION__);
    }

    private function can(User $user, string $methodName, $modelClassName = null): bool
    {
        $permissionName = $this->getPermissionNameByFunctionName($methodName);

        return $user->can($permissionName, $modelClassName);
    }

    private function getPermissionNameByFunctionName(string $functionName): string
    {
        $permissionEntityName = $this->getPermissionEntityName();

        $permissionActionName = $this->getPermissionActionNameByMethodName($functionName);

        return "{$permissionEntityName}.{$permissionActionName}";
    }

    abstract protected function getPermissionEntityName(): string;

    private function getPermissionActionNameByMethodName(string $methodName): string
    {
        $methodNameToPermissionActionNameMap = [
            'viewAny' => 'index',
            'view' => 'show',
            'create' => 'create',
            'update' => 'update',
            'delete' => 'destroy',
        ];

        if (array_key_exists($methodName, $methodNameToPermissionActionNameMap)) {
            return $methodNameToPermissionActionNameMap[$methodName];
        }

        return $methodName;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Domain\User\User $user
     * @param \App\Domain\GuestbookEntry\Related\AdminResponse\AdminResponse $adminResponse
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, AdminResponse $adminResponse)
    {
        return $this->can($user, __FUNCTION__, $adminResponse);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Domain\User\User $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $this->can($user, __FUNCTION__);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Domain\User\User $user
     * @param \App\Domain\GuestbookEntry\Related\AdminResponse\AdminResponse $adminResponse
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, AdminResponse $adminResponse)
    {
        return $this->can($user, __FUNCTION__, $adminResponse);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Domain\User\User $user
     * @param \App\Domain\GuestbookEntry\Related\AdminResponse\AdminResponse $adminResponse
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, AdminResponse $adminResponse)
    {
        return $this->can($user, __FUNCTION__, $adminResponse);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Domain\User\User $user
     * @param \App\Domain\GuestbookEntry\Related\AdminResponse\AdminResponse $adminResponse
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, AdminResponse $adminResponse)
    {
        return $this->can($user, __FUNCTION__, $adminResponse);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Domain\User\User $user
     * @param \App\Domain\GuestbookEntry\Related\AdminResponse\AdminResponse $adminResponse
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, AdminResponse $adminResponse)
    {
        return $this->can($user, __FUNCTION__, $adminResponse);
    }
}
