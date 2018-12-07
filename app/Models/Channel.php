<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $fillable = ['channel_id'];

    public function threads()
    {
        return $this->hasMany(Thread::class, 'channel_id');
    }

    //*overriding the primary key
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
