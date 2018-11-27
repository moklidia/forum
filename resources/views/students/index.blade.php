@extends('layout')

@section('title')
    Students
@endsection

@section('content')

<h1 style="margin-bottom: 1em;">Students</h1>
<body>

<form method="GET" action="/students/create">
    <div class="field" style="margin-bottom: 1em; margin-top: 1em;">
        <div class="control">
            <button type="submit" class="btn btn-light">Add Student</button>
        </div>
    </div>
</form>

<table class="table table-hover">
	<thead>
		<tr>
			<td scope="col">ID</td>
			<td scope="col">Last name</td>
			<td scope="col">First name</td>
			<td scope="col">Date of birth</td>
			<td scope="col">Group ID</td>
            <td scope="col"></td>
		</tr>
	</thead>
	<tbody>
	@foreach($students as $student)
		<tr>
			<td>{{ $student->id }}</td>
			<td>
				<a href="/students/{{ $student->id }}">
				{{ $student->last_name }}</td>
			</a>
			<td>{{ $student->given_name }}</td>
			<td>{{ $student->date_of_birth }}</td>
			<td>{{ $student->group_id }}</td>
            <td>
                <form method="GET" action="/students/{{ $student->id }}/edit">
                    <div class="field">
                        <div class="control">
                            <button type="submit" class="btn btn-primary">Edit Student</button>
                        </div>
                    </div>
                </form>
            </td>
		</tr>
	@endforeach
	</tbody>
	</table>
	</body>
@endsection
