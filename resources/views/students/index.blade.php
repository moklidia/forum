@extends('layout')

@section('content')

<h1>Students</h1>
<body>
<table border style="width:50%">
	<thead>
		<tr>
			<td>ID</td>
			<td>Last name</td>
			<td>First name</td>
			<td>Date of birth</td>
			<td>Group ID</td>
		</tr>
	</thead>
	<tbody>
	@foreach($students as $student)
		<tr>
			<td>{{ $student->id }}</td>
			<td>{{ $student->last_name }}</td>
			<td>{{ $student->given_name }}</td>
			<td>{{ $student->date_of_birth }}</td>
			<td>{{ $student->group_id }}</td>
		</tr>
	@endforeach
	</tbody>
	</table>
	</body>
@endsection