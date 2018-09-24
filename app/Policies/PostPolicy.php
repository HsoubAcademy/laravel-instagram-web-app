<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }

    public function edit(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }

    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }

    public function show(User $user, Post $post)
    {
        return in_array($post->user_id,$user->following()->where(["accepted"=>1])->pluck('to_user_id')->toArray()) || $user->id == $post->user_id;
    }

    public function show_friend(User $user , $user_id)
    {
        return $user->following()->where(["accepted"=>1,"to_user_id"=>$user_id])->count();
    }
}
