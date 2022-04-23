<?php

namespace App\Http\Controllers;

use App\Models\Category;

class CategoryController extends Controller
{
    public function __invoke(Category $category)
    {
        $categories = $category->all();
        $posts = $category->posts()->paginate(10);
        return view('category.posts', compact('categories', 'posts'));
    }
}
