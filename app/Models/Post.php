<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class)->select(['id', 'name', 'username', 'profileImg']);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function checkLikedByUser($user)
    {
        return $this->likes->contains('user_id', $user->id);
    }
}
