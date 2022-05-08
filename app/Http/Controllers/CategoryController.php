<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function __invoke(Category $category)
    {
        $posts = $category->posts()
                    ->withCount([
                        'likes',
                        'comments',
                        'isLiked as isLiked',
                        'isBookmarked as isBookmarked'
                    ])
                    ->orderByDesc('created_at')
                    ->paginate(10);
        return view('category.posts', compact('posts'));
    }
}
