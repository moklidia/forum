<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $fillable = ['points'];

	//Get the student the credit points are related to
    public function student()
    {
    	return $this->belongsTo('App/Models/Student');
    }
    //Get the subject the credit points are related to
    public function subject()
    {
    	return $this->belongsTo('App/Models/Subject');
    }
}
