<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\Bagian;
use Illuminate\Auth\Access\HandlesAuthorization;

class BagianPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:Bagian');
    }

    public function view(AuthUser $authUser, Bagian $bagian): bool
    {
        return $authUser->can('View:Bagian');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:Bagian');
    }

    public function update(AuthUser $authUser, Bagian $bagian): bool
    {
        return $authUser->can('Update:Bagian');
    }

    public function delete(AuthUser $authUser, Bagian $bagian): bool
    {
        return $authUser->can('Delete:Bagian');
    }

    public function restore(AuthUser $authUser, Bagian $bagian): bool
    {
        return $authUser->can('Restore:Bagian');
    }

    public function forceDelete(AuthUser $authUser, Bagian $bagian): bool
    {
        return $authUser->can('ForceDelete:Bagian');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:Bagian');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:Bagian');
    }

    public function replicate(AuthUser $authUser, Bagian $bagian): bool
    {
        return $authUser->can('Replicate:Bagian');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:Bagian');
    }

}