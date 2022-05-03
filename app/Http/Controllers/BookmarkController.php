<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;

class BookmarkController extends Controller
{
    public function store(User $user, Post $post)
    {
        $this->authorize('bookmark', $post);

        $user->findOrFail(auth()->user()->id)
                ->bookmarks()
                ->toggle($post);
                
        return redirect()->back();
    }
}
