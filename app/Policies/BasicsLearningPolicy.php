<?php

namespace App\Policies;


use App\Models\basics_learning;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BasicsLearningPolicy
{

    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     */
    // public function viewAny(User $user): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can view the model.
     */
    // public function view(User $user, basics_learning $basicsLearning): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can create models.
     */
    // public function create(User $user): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, basics_learning $basics_learning): bool
    {
        return $basics_learning->user()->is($user);
    }

    /**
     * Determine whether the user can delete the model.
     */
     public function delete(User $user, basics_learning $basics_learning): bool
     {
          return $this->update($user, $basics_learning);
    }

    /**
     * Determine whether the user can restore the model.
     */
    // public function restore(User $user, basics_learning $basicsLearning): bool
    // {
    //     //
    // }

    /**
     * Determine whether the user can permanently delete the model.
     */
    // public function forceDelete(User $user, basics_learning $basicsLearning): bool
    // {
    //     //
    // }
}
