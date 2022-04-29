<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;

class IndexController extends Controller
{
    public function __invoke(Post $post, Category $category)
    {
        $posts = $post->withCount('comments')
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
        $categories = $category->all();
        return view('index', compact('posts', 'categories'));
    }
}
