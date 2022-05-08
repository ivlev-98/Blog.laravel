<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;

class IndexController extends Controller
{
    public function __invoke(Post $post, Category $category)
    {
        $posts = $post->withCount([
            'likes',
            'comments',
            'isLiked as isLiked',
            'isBookmarked as isBookmarked'
        ])->orderByDesc('created_at')->paginate(10);
        return view('index', compact('posts'));
    }
}
