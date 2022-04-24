<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function create(Category $category)
    {
        $categories = $category->all();
        return view('post.create', compact('categories'));
    }

    public function store(Post $post, Request $request)
    {
        $post->title = $request->title;
        $post->short_title = Str::length($request->title) > 30 ? Str::substr($request->title, 0, 30).'...' : $request->title;
        $post->user_id = 1;
        $post->category_id = $request->category;
        $post->content = $request->content;
        $post->short_content = Str::length($request->content) > 300 ? Str::substr($request->content, 0, 300).'...' : $request->content;
        $post->img = "/fbhwbbrb.jpg";
        $post->save();
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

    public function update(Post $post, Request $request)
    {
        $post->title = $request->title;
        $post->short_title = Str::length($request->title) > 30 ? Str::substr($request->title, 0, 30).'...' : $request->title;
        $post->user_id = 1;
        $post->category_id = $request->category;
        $post->content = $request->content;
        $post->short_content = Str::length($request->content) > 300 ? Str::substr($request->content, 0, 300).'...' : $request->content;
        $post->img = "/fbhwbbrb.jpg";
        $post->save();
        return to_route('post.show', [$post->id])
            ->with('success', 'Пост успешно отредактирован');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('category.show', [$post->category_id])
            ->with('success', 'Пост успешно удален');
    }
}
