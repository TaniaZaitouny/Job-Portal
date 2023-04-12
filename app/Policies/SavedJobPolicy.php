<?php

namespace App\Policies;

use App\Models\SavedJob;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SavedJobPolicy
{
    
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, SavedJob $savedJob): bool
    {
        return $user->id === $savedJob->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, SavedJob $savedJob): bool
    {
        return $user->id === $savedJob->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, SavedJob $savedJob): bool
    {
        return $user->id === $savedJob->user_id;
    }
}
