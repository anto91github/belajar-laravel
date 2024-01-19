<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title', 'news_content', 'author', 'image'];

    
    public function writer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author', 'id');
    }

    // public function comments(): BelongsToMany
    // {
    //     return $this->belongsToMany(Comment::class, 'comments', 'post_id', 'user_id');
    // }

    public function commentsUser()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
}
