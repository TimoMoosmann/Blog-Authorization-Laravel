<?php

namespace App\Policies;

use App\Models\BlogEntry;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BlogEntryPolicy
{
    use HandlesAuthorization;

    /**
     * Perform pre-authorization checks.
     *
     * @param  \App\Models\User  $user
     * @param  string  $ability
     * @return void|bool
     */
    public function before(User $user, $ability)
    {
        if($user->role === "admin") {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(?User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BlogEntry  $blogEntry
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(?User $user, BlogEntry $blogEntry)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->role === 'writer';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BlogEntry  $blogEntry
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, BlogEntry $blogEntry)
    {
        return $user->id === $blogEntry->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BlogEntry  $blogEntry
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, BlogEntry $blogEntry)
    {
        return $user->id === $blogEntry->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BlogEntry  $blogEntry
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, BlogEntry $blogEntry)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\BlogEntry  $blogEntry
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, BlogEntry $blogEntry)
    {
        //
    }
}
