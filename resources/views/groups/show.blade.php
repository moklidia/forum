@extends('layouts.app')
@section('title')
Group Information
@endsection
@section('content')
<h1 class="title" style="margin-top: 1em;">{{ $group->name }}</h1>
<div class="content">{{ $group->description }}</div>
<p>
    <a href="/groups/{{ $group->id }}/edit">Edit</a>
</p>
<table class="table table-hover">
    @foreach($students as $student)
    @if ($loop->first)
    <thead>
        <tr>
            <td scope="col">Group ID</td>
            <td scope="col">Last name</td>
            <td scope="col">First name</td>
            @foreach($subjects as $subject)
            <td>{{ $subject->name }}</td>
            @endforeach
        </tr>
    </thead>
    <tfoot>
    <tr>
        <td colspan="3">Average</td>
        @foreach($subjects as $subject)
        <td scope="col"> {{ $subject->groupAverage }}</td>
        @endforeach
    </tr>
    </tfoot>
    @endif
    <tbody>
        <tr>
            <td>{{ $student->group_id }}</td>
            <td>{{ $student->last_name }}</td>
            <td>{{ $student->given_name }}</td>
            @foreach($student->subjects as $subject)
            <td>{{ $subject->pivot->points }}</td>
            @endforeach
        </tr>
        @endforeach
    </tbody>
</table>
    @endsection