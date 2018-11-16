<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Point;

class ResultsController extends Controller
{
    public function index()
    {
        $group = Group::findOrFail($id);
        $students = Student::all();
        
        return View::make('students.index')
        ->with('students', $students);
    }
}
