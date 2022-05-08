<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)
                ->withCount('likes')
                ->orderBy('created_at');
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'post_user_likes', 'post_id', 'user_id');
    }

    public function bookmarks()
    {
        return $this->belongsToMany(Post::class, 'bookmarks', 'post_id', 'user_id');
    }

    public function isLiked()
    {
        return $this->likes()
                    ->wherePivot('user_id', '=', auth()->user()->id ?? 0);
    }

    public function isBookmarked()
    {
        return $this->belongsToMany(User::class, 'bookmarks', 'post_id', 'user_id')
                    ->wherePivot('user_id', '=', auth()->user()->id ?? 0);
    }

}
