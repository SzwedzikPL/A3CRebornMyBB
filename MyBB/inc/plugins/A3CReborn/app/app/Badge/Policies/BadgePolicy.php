<?php

namespace App\Badge\Policies;

use App\App\Badge\Model\Badge;
use App\Core\Model\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BadgePolicy
{
    use HandlesAuthorization;

    /**
     * @return bool
     */
    public function before()
    {
        return true;
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Core\Model\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Core\Model\User  $user
     * @param  \App\App\Badge\Model\Badge  $badge
     * @return mixed
     */
    public function view(User $user, Badge $badge)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Core\Model\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Core\Model\User  $user
     * @param  \App\App\Badge\Model\Badge  $badge
     * @return mixed
     */
    public function update(User $user, Badge $badge)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Core\Model\User  $user
     * @param  \App\App\Badge\Model\Badge  $badge
     * @return mixed
     */
    public function delete(User $user, Badge $badge)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Core\Model\User  $user
     * @param  \App\App\Badge\Model\Badge  $badge
     * @return mixed
     */
    public function restore(User $user, Badge $badge)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Core\Model\User  $user
     * @param  \App\App\Badge\Model\Badge  $badge
     * @return mixed
     */
    public function forceDelete(User $user, Badge $badge)
    {
        //
    }

    /**
     * Determine whether the user can promote another user with badge
     *
     * @param User $user
     */
    public function promote(User $user)
    {
        //
    }

    /**
     * Determine whether the user can take badge from other user
     *
     * @param User $user
     */
    public function take(User $user)
    {
        //
    }
}
