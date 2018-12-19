<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];
    protected $fillable = ['title', 'body'];
    protected $with = ['creator'];
    
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
