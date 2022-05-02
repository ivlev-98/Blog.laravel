<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentLikeController extends Controller
{
    public function __invoke(Comment $comment)
    {
        $this->authorize('like', $comment);
        $comment->likes()->toggle(auth()->user()->id);
        return redirect()->back();
    }
}
