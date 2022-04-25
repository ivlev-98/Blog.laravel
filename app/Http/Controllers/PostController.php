<?php

namespace App\Http\Controllers;

use App\Actions\PostStoreAction;
use App\Actions\PostUpdateAction;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function create(Category $category)
    {
        $categories = $category->all();
        return view('post.create', compact('categories'));
    }

    public function store(Post $post, Request $request, PostStoreAction $action)
    {
        $action->handle($post, $request);
        return to_route('post.show', [$post->id])
            ->with('success', 'Пост успешно создан');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post, Category $category)
    {
        $categories = $category->all();
        return view('post.edit', compact('post', 'categories'));
    }

    public function update(Post $post, Request $request, PostUpdateAction $action)
    {
        $action->handle($post, $request);
        return to_route('post.show', [$post->id])
            ->with('success', 'Пост успешно отредактирован');
    }

    public function destroy(Post $post)
    {
        Storage::delete($post->img);
        $post->delete();
        return to_route('category.show', [$post->category_id])
            ->with('success', 'Пост успешно удален');
    }
}
