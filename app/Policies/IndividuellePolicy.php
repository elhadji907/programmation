<?php

namespace App\Policies;

use App\User;
use App\Individuelle;
use Illuminate\Auth\Access\HandlesAuthorization;

class IndividuellePolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any individuelles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the individuelle.
     *
     * @param  \App\User  $user
     * @param  \App\Individuelle  $individuelle
     * @return mixed
     */
    public function view(User $user, Individuelle $individuelle)
    {
        return $user->id === $individuelle->demandeur->user->id;
    }

    /**
     * Determine whether the user can create individuelles.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the individuelle.
     *
     * @param  \App\User  $user
     * @param  \App\Individuelle  $individuelle
     * @return mixed
     */
    public function update(User $user, Individuelle $individuelle)
    {
        return $user->id === $individuelle->demandeur->user->id;
    }

    /**
     * Determine whether the user can delete the individuelle.
     *
     * @param  \App\User  $user
     * @param  \App\Individuelle  $individuelle
     * @return mixed
     */
    public function delete(User $user, Individuelle $individuelle)
    {
        return $user->id === $individuelle->demandeur->user->id;
    }

    /**
     * Determine whether the user can restore the individuelle.
     *
     * @param  \App\User  $user
     * @param  \App\Individuelle  $individuelle
     * @return mixed
     */
    public function restore(User $user, Individuelle $individuelle)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the individuelle.
     *
     * @param  \App\User  $user
     * @param  \App\Individuelle  $individuelle
     * @return mixed
     */
    public function forceDelete(User $user, Individuelle $individuelle)
    {
        //
    }
}
