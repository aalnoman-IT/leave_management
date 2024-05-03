<?php

namespace App\Policies;

use App\Models\User;
use App\Models\LeaveStatus;
use App\Models\LeaveType;

use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, user $model): bool
    {
        return $user->isAdmin() || $user->isEmployee();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, user $model): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, user $model): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, user $model): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, user $model): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view LeaveStatus resources.
     */
    public function viewLeaveStatuses(User $user): bool
    {
        return $user->isAdmin() || $user->isEmployee();
    }

    /**
     * Determine whether the user can update LeaveStatus resources.
     */
    public function updateLeaveStatuses(User $user): bool
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view LeaveType resources.
     */
    public function viewLeaveTypes(User $user): bool
    {
        return $user->isAdmin() || $user->isEmployee();
    }

    /**
     * Determine whether the user can update LeaveType resources.
     */
    public function updateLeaveTypes(User $user): bool
    {
        return $user->isAdmin();
    }
}