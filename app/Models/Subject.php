<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //Get credit points for a subject

    public function points()
    {
    	return $this->hasMany('App/Models/Point');
    }
}
