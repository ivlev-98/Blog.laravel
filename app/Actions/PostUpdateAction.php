<?php

namespace App\Actions;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostUpdateAction
{
    public function handle($post, $request)
    {
        $post->title = $request->title;
        $post->short_title = Str::length($request->title) > 30 ? Str::substr($request->title, 0, 30).'...' : $request->title;
        $post->user_id = 1;
        $post->category_id = $request->category;
        $post->content = $request->content;
        $post->short_content = Str::length($request->content) > 300 ? Str::substr($request->content, 0, 300).'...' : $request->content;
        if($request->hasFile('img'))
        {
            Storage::delete($post->img);
            $post->img = $request->img->store('images');
        }
        $post->save();
    }
}
