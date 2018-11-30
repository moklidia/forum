<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Requests\GroupValidation;
use View;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();

        return View::make('groups.index')
            ->with('groups', $groups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupValidation $request)
    {
        Group::create($request->input());
        
        return redirect()->route('groups.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        $students = $group->students()->get();
        $subjects = Subject:: all();
        $studentIds = $students->pluck('id');
        
            
        foreach ($subjects as $subject) {

            $groupAverage = $subject->points->whereIn('student_id', $studentIds)->avg('points');
            $subject->groupAverage = $groupAverage;
        }

        return view('groups.show', compact('group', 'students', 'subjects', 'groupAverage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {

        return view('groups.edit', compact('group'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Group               $group
     * @return \Illuminate\Http\Response
     */
    public function update(GroupValidation $request, Group $group)
    {

        $group->update($request->all());

        return redirect()->route('groups.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group $group
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Group::findOrFail($id)->delete();

        return redirect()->route('groups.index');
    }
}
