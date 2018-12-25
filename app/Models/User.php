<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Redis;

class User extends Authenticatable
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'password', 'avatar',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function threads()
    {
        return $this->hasMany(Thread::class, 'user_id')->latest();
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function lastSeen()
    {
        $redis = Redis::connection();

        return $redis->get('last_seen_' . $this->id);
    }
    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }

    public function activity()
    {
        return $this->hasMany(Activity::class);
    }
}
