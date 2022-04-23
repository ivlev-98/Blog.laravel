<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;

class IndexController extends Controller
{
    public function __invoke(Post $post, Category $category)
    {
        $posts = $post->paginate(10);
        $categories = $category->all();
        return view('index', compact('posts', 'categories'));
    }
}
