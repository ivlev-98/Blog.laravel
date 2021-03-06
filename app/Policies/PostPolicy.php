<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->isAdmin())
            return true;
    }

    public function create(User $user)
    {
        return $user->id > 0;
    }

    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }

    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }

    public function like(User $user)
    {
        return $user->id > 0;
    }

    public function bookmark(User $user)
    {
        return $user->id > 0;
    }
}
