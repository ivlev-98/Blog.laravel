<?php

namespace App\Actions;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostUpdateAction
{
    public function handle($post, $request)
    {
        $post->title = $request->title;
        $post->short_title = Str::limit($request->title, 30, '...');
        $post->user_id = $post->user_id;
        $post->category_id = $request->category;
        $post->content = $request->content;
        $post->short_content = $request->short_content;
        if($request->hasFile('img'))
        {
            Storage::delete($post->img);
            $post->img = $request->img->store('images');
        }
        $post->save();
    }
}
