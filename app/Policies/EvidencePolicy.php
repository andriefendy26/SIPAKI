<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Evidence;
use Illuminate\Auth\Access\HandlesAuthorization;

class EvidencePolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Evidence');
    }

    public function view(AuthUser $authUser, Evidence $evidence): bool
    {
        return $authUser->can('View:Evidence');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Evidence');
    }

    public function update(AuthUser $authUser, Evidence $evidence): bool
    {
        return $authUser->can('Update:Evidence');
    }

    public function delete(AuthUser $authUser, Evidence $evidence): bool
    {
        return $authUser->can('Delete:Evidence');
    }

    public function restore(AuthUser $authUser, Evidence $evidence): bool
    {
        return $authUser->can('Restore:Evidence');
    }

    public function forceDelete(AuthUser $authUser, Evidence $evidence): bool
    {
        return $authUser->can('ForceDelete:Evidence');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Evidence');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Evidence');
    }

    public function replicate(AuthUser $authUser, Evidence $evidence): bool
    {
        return $authUser->can('Replicate:Evidence');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Evidence');
    }

}