<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use Favoritable;

    protected $guarded = [];
    protected $fillable =  ['body', 'user_id'];
    protected $with = ['owner', 'favorites'];
    
    /*protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('favoriteCount', function ($builder) {
            $builder->withCount('favorites');
        });
    }*/

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
