<?php

namespace App\Policies;

use App\Models\Application;
use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ApplicationPolicy
{
    
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->role === 'person';
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Job $job): bool
    {
        return $user->id === $job->company_id;
    }


    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Application $application): bool
    {
        return $user->id === $application->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Application $application): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Application $application): bool
    {
        return $user->id === $application->user_id;
    }
}
