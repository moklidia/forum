<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Group extends Model
{
    protected $fillable = ['name', 'description'];
    
    //Get students for a group

    public function students()
    {
        return $this->hasMany('App\Models\Student');
    }
}
