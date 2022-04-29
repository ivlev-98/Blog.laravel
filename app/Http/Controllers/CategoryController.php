<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function __invoke(Category $category)
    {
        $categories = $category->all();
        $posts = $category->posts()
                    ->withCount('comments')
                    ->orderBy('created_at', 'desc')
                    ->paginate(10);
        return view('category.posts', compact('categories', 'posts'));
    }
}
