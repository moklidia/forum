<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Comment extends Model
{
    use NodeTrait;

    protected $guarded = [];
    protected $with = ['owner'];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Comment', 'parent_id', 'id');
    }

    public function scopeByPost($query, $post)
    {
        return $query->where('post_id', $post->id);
    }
}
