<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{

    use RecordsActivity;

    protected $guarded = [];

    protected $with = ['creator', 'channel'];

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('replyCount', function ($builder) {
            $builder->withCount('replies');
        });
        static::deleting(function ($thread) {
            $thread->replies->each->delete();
        });
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function addReply($reply)
    {
        $this->replies()->create($reply);
    }

    public function path()
    {
        return "/threads/{$this->channel->slug}/{$this->id}";
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class, 'channel_id');
    }

    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }

    public function scopeByUser($query, $user)
    {
        return $query->where('user_id', $user->id);
    }
}
