<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Group;

class ResultsController extends Controller
{

    public function index()
    {

        $students = Student::with('subjects')->get();
        $subjects = Subject::all();
        foreach ($students as $student) {

            $average[$student->id] = round($student->points->avg('points'), 1);
            $colors[$student->id] = $this->getColor($average[$student->id], $student->id);
        }

        $excellents = array_where($average, function ($value, $key) {
            return ($value == 5);
        });
        $excellentStudents = $students->whereIn('id', array_keys($excellents));

        $goods = array_where($average, function ($value, $key) {
            return ($value >= 4.5 && $value < 5);
        });
        $goodStudents = $students->whereIn('id', array_keys($goods));

        return view('results.index',
            compact('students', 'subjects', 'excellentStudents', 'colors', 'average', 'goodStudents'));
    }

    public function getColor($point, $id)
    {
        $color = "#000000";
        if (($point >= 4.5) && ($point <= 5))
            $color = "#10DA3B";
        elseif (($point > 3) && ($point < 4.5))
            $color = "#F1BE37";
        elseif ($point <= 3)
            $color = "#F8280D";

        return $colors[$id] = $color;
    }
}
