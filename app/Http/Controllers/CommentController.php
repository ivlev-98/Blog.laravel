<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Post $post, Request $request)
    {
        $this->authorize('create', Comment::class);
        $request->mergeIfMissing(['user_id' => Auth::user()->id]);
        $post->comments()->create($request->all());
        return to_route('post.show', $post)
                ->with('success', 'Комментарий успешно добавлен');
    }
    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();
        return redirect()->back()->with('success', 'Комментарий удален');
    }
}
