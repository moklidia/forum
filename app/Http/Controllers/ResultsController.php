<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Point;

class ResultsController extends Controller {

	public function index() {

	    $students = Student::with('subjects')->get();
		$subjects = Subject::all();



		return view('results.index', compact('students', 'subjects'));
	}
}
