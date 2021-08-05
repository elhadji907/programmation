<?php

namespace App\Policies;

use App\User;
use App\Courrier;
use Illuminate\Auth\Access\HandlesAuthorization;

class CourrierPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any courriers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the courrier.
     *
     * @param  \App\User  $user
     * @param  \App\Courrier  $courrier
     * @return mixed
     */
    public function view(User $user, Courrier $courrier)
    {
        return $user->id == $courrier->user->id;
    }

    /**
     * Determine whether the user can create courriers.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the courrier.
     *
     * @param  \App\User  $user
     * @param  \App\Courrier  $courrier
     * @return mixed
     */
    public function update(User $user, Courrier $courrier)
    {
        return $user->id == $courrier->user->id;
    }

    /**
     * Determine whether the user can delete the courrier.
     *
     * @param  \App\User  $user
     * @param  \App\Courrier  $courrier
     * @return mixed
     */
    public function delete(User $user, Courrier $courrier)
    {
        return $user->id == $courrier->user->id;
    }

    /**
     * Determine whether the user can restore the courrier.
     *
     * @param  \App\User  $user
     * @param  \App\Courrier  $courrier
     * @return mixed
     */
    public function restore(User $user, Courrier $courrier)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the courrier.
     *
     * @param  \App\User  $user
     * @param  \App\Courrier  $courrier
     * @return mixed
     */
    public function forceDelete(User $user, Courrier $courrier)
    {
        //
    }
}
