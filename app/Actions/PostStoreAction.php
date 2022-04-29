<?php

namespace App\Actions;

use Illuminate\Support\Str;

class PostStoreAction
{
    public function handle($post, $request)
    {
        $post->title = $request->title;
        $post->short_title = Str::limit($request->title, 30, '...');
        $post->user_id = 1;
        $post->category_id = $request->category;
        $post->content = $request->content;
        $post->short_content = $request->short_content;
        $post->img = $request->img->store('images');
        $post->save();
    }
}
