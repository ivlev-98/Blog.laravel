<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
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

    public function delete(User $user, Comment $comment)
    {
        return $comment->user_id === $user->id;
    }

    public function like(User $user)
    {
        return $user->id > 0;
    }
}
