<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model {
	protected $fillable = ['name'];

	public function students() {
		return $this->belongsToMany(Student::class, 'points', 'subject_id', 'student_id');
	}
}
