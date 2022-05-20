<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{

    public function index(Category $category): View
    {
        $this->authorize('viewAny', $category);
        $categories = $category->withCount(['posts'])->paginate(10);
        return view('category.index', compact('categories'));
    }

    public function show(Category $category): View
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
        return view('category.show', compact('posts'));
    }

    public function create(): View
    {
        $this->authorize('create', Category::class);
        return view('category.create');
    }

    public function edit(Category $category): View
    {
        $this->authorize('update', $category);
        return view('category.edit', compact('category'));
    }

    public function store(StoreRequest $request, Category $category): RedirectResponse
    {
        $category->title = $request->title;
        $category->save();
        return to_route('category.index')->with('success', 'Категория добавлена');
    }

    public function update(UpdateRequest $request, Category $category): RedirectResponse
    {
        $category->title = $request->title;
        $category->save();
        return to_route('category.index')->with('success', 'Категория изменена');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return to_route('category.index')->with('success', 'Категория удалена');
    }
}
