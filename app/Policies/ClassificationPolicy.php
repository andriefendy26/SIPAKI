<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Classification;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClassificationPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Classification');
    }

    public function view(AuthUser $authUser, Classification $classification): bool
    {
        return $authUser->can('View:Classification');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Classification');
    }

    public function update(AuthUser $authUser, Classification $classification): bool
    {
        return $authUser->can('Update:Classification');
    }

    public function delete(AuthUser $authUser, Classification $classification): bool
    {
        return $authUser->can('Delete:Classification');
    }

    public function restore(AuthUser $authUser, Classification $classification): bool
    {
        return $authUser->can('Restore:Classification');
    }

    public function forceDelete(AuthUser $authUser, Classification $classification): bool
    {
        return $authUser->can('ForceDelete:Classification');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Classification');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Classification');
    }

    public function replicate(AuthUser $authUser, Classification $classification): bool
    {
        return $authUser->can('Replicate:Classification');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Classification');
    }

}