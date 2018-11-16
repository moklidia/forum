@extends('layout')

@section('content')

<h1 style="margin-top: 1em;">Students</h1>
<body>
<table class="table">
	<thead>
		<tr>
			<td scope="col">ID</td>
			<td scope="col">Last name</td>
			<td scope="col">First name</td>
			<td scope="col">Date of birth</td>
			<td scope="col">Group ID</td>
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
		</tr>
	@endforeach
	</tbody>
	</table>
	</body>
@endsection