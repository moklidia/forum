<?php

namespace App\Models;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;

class Student extends Model {

	protected $fillable = ['last_name', 'given_name', 'date_of_birth'];

	public function group() {
		return $this->belongsTo('App/Models/Group');
	}

	public function subjects() {
		return $this->belongsToMany(Subject::class, 'points', 'student_id', 'subject_id')->withPivot('points');
	}
}
