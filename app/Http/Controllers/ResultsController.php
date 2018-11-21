<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Point;

class ResultsController extends Controller
{

    public function index()
    {

        $students = Student::with('subjects')->get();
        $subjects = Subject::all();
        foreach ($students as $student) {
            $average = Point::where('student_id', $student->id)->avg('points');
            $student->avgPoint = $average;

            $color = "#000000";
            if (($student->avgPoint >= 4.5) && ($student->avgPoint <= 5))
                $color = "#10DA3B";
            elseif (($student->avgPoint > 3) && ($student->avgPoint < 4.5))
                $color = "#F1BE37";
            elseif ($student->avgPoint <= 3)
                $color = "#F8280D";

            $student->color = $color;
        }
        
        return view('results.index', compact('students', 'subjects'));
    }
}
