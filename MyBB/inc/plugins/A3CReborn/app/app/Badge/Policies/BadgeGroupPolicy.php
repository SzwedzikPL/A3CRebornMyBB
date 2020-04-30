<?php

namespace App\Badge\Policies;

use App\App\Badge\Model\BadgeGroup;
use App\Core\Model\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BadgeGroupPolicy
{
    use HandlesAuthorization;

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
     * @param  \App\App\Badge\Model\BadgeGroup  $badgeGroup
     * @return mixed
     */
    public function view(User $user, BadgeGroup $badgeGroup)
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
     * @param  \App\App\Badge\Model\BadgeGroup  $badgeGroup
     * @return mixed
     */
    public function update(User $user, BadgeGroup $badgeGroup)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Core\Model\User  $user
     * @param  \App\App\Badge\Model\BadgeGroup  $badgeGroup
     * @return mixed
     */
    public function delete(User $user, BadgeGroup $badgeGroup)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Core\Model\User  $user
     * @param  \App\App\Badge\Model\BadgeGroup  $badgeGroup
     * @return mixed
     */
    public function restore(User $user, BadgeGroup $badgeGroup)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Core\Model\User  $user
     * @param  \App\App\Badge\Model\BadgeGroup  $badgeGroup
     * @return mixed
     */
    public function forceDelete(User $user, BadgeGroup $badgeGroup)
    {
        //
    }
}
