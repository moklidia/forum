@extends('layout')
@section('title')
View results
@endsection
@section('content')
<h1 style="margin-bottom: 1em;">Results</h1>
<h2 style="margin-top: 1em;">All</h2>
<body>
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
                <td scope="col">Average</td>
            </tr>
        </thead>
        @endif
        <tbody>
            <tr>
                <td>{{ $student->group_id }}</td>
                <td>{{ $student->last_name }}</td>
                <td>{{ $student->given_name }}</td>
                @foreach($student->subjects as $subject)
                <td>{{ $subject->pivot->points }}</td>
                @endforeach
                <td class="@class($student->avg_point)">{{ $student->avg_point }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h2 style="margin-top: 1em;">Excellent results</h2>
    <table class="table">
        @foreach($excellentStudents as $excellent)
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
        @endif
        <tbody>
            <tr>
                <td>{{ $excellent->group_id }}</td>
                <td>{{ $excellent->last_name }}</td>
                <td>{{ $excellent->given_name }}</td>
                @foreach($excellent->subjects as $subject)
                <td>{{ $subject->pivot->points }}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
    <h2 style="margin-top: 1em;">Good results</h2>
    <table class="table">
        @foreach($goodStudents as $good)
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
        @endif
        <tbody>
            <tr>
                <td>{{ $good->group_id }}</td>
                <td>{{ $good->last_name }}</td>
                <td>{{ $good->given_name }}</td>
                @foreach($good->subjects as $subject)
                <td>{{ $subject->pivot->points }}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
@endsection