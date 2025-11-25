<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'content', 'media_path'];

    // Owner of the post
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Likes on this post
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // Comments on this post
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function media(){
        return $this->hasMany(Media::class);
    }
}
