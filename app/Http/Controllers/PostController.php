<?php

namespace App\Http\Controllers;

use App\Actions\PostStoreAction;
use App\Actions\PostUpdateAction;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function create(Category $category)
    {
        $this->authorize('create', new Post);
        $categories = $category->all();
        return view('post.create', compact('categories'));
    }

    public function store(Post $post, StoreRequest $request, PostStoreAction $action)
    {
        $this->authorize('create', $post);
        $action->handle($post, $request);
        return to_route('post.show', [$post->id])
            ->with('success', 'Пост успешно создан');
    }

    public function show(Post $post)
    {
        $post = $post::withCount('comments')->find($post->id);
        $post->comments = $post->comments()->paginate(10);
        return view('post.show', compact('post'));
    }

    public function edit(Post $post, Category $category)
    {
        $this->authorize('update', $post);
        $categories = $category->all();
        return view('post.edit', compact('post', 'categories'));
    }

    public function update(Post $post, UpdateRequest $request, PostUpdateAction $action)
    {
        $this->authorize('update', $post);
        $action->handle($post, $request);
        return to_route('post.show', [$post->id])
            ->with('success', 'Пост успешно отредактирован');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        Storage::delete($post->img);
        $post->delete();
        return to_route('category.show', [$post->category_id])
            ->with('success', 'Пост успешно удален');
    }
}
