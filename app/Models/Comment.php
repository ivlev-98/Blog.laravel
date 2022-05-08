<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $with = [
        'user'
    ];

    protected $withCount = [
        'likes',
        'isLiked as isLiked'
    ];

    protected $fillable = [
        'post_id',
        'user_id',
        'content'
    ];


    use HasFactory;

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'comment_user_likes', 'comment_id', 'user_id');
    }

    public function isLiked()
    {
        return $this->likes()
                    ->wherePivot('user_id', '=', auth()->user()->id ?? 0);
    }
}
