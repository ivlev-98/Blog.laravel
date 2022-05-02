<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

class LikePostController extends Controller
{
    public function __invoke(Post $post)
    {
        $this->authorize('like', $post);
        $post->likes()->toggle(auth()->user()->id);
        return redirect()->back();
    }
}
