<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'profile_picture',
        'bio'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Posts by this user
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // Users this user is following
    public function following()
    {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'following_id');
    }

    // Users who follow this user
    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'follower_id');
    }

    // Likes this user made
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // Comments this user made
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Messages sent
    public function sentMessages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    // Messages received
    public function receivedMessages()
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }

    // Notifications received
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
