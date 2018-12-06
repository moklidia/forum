<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Group;
use App\Repositories\PointsRepository;
use App\Services\StudentService;

class ResultsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function index()
    {

        $students = Student::with('subjects', 'points')->get();

        $subjects = Subject::all();


        $excellentStudents = $students->where('avg_point', '=', '5');
        $goodStudents = $students->where('avg_point', '>=', '4.5')
            ->where('avg_point', '<', '5');

        return view(
            'results.index',
            compact('students', 'subjects', 'excellentStudents', 'goodStudents')
        );
    }
}
