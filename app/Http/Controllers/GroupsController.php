<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;
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
    public function store(Request $request)
    {
        $group = new Group;
        $group->name = $request->input('name');
        $group->description = $request->input('description');
        $group->save();
        return redirect('/groups');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        $students = Student::with('subjects')->where(['group_id' => $group->id])->get();
        $subjects = Subject:: all();
/*        foreach($students as $student){
            $studentIds[] = $student->id;
        }*/

        foreach ($subjects as $subject) {

            $groupAverage[$subject->id] = $subject->points->whereIn('student_id', array_values($studentIds))->avg('points');
        }
        dd($subject->id);

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
     * @param  \App\Group $group
     * @return \Illuminate\Http\Response
     */
    public function update(Group $group)
    {

        $group->name = request('name');
        $group->description = request('description');

        $group->save();

        return redirect('/groups');
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

        return redirect('/groups');
    }
}
