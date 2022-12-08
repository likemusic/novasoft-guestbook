<?php

namespace App\Domain\Base;

use App\Domain\User\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\Model;

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
     */
    public function view(User $user, Model $model)
    {
        return $this->can($user, __FUNCTION__, $model);
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
     */
    public function update(User $user, Model $model)
    {
        return $this->can($user, __FUNCTION__, $model);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Model $model)
    {
        return $this->can($user, __FUNCTION__, $model);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Model $model)
    {
        return $this->can($user, __FUNCTION__, $model);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Model $model)
    {
        return $this->can($user, __FUNCTION__, $model);
    }
}
