@extends('layout')

@section('content')

<h1>Students</h1>

<table border style="width:50%">
	<thead>
		<tr>
			<td>ID</td>
			<td>Last name</td>
			<td>First name</td>
			<td>Date of birth</td>
		</tr>
	</thead>
	<tbody>
	@foreach($students as $student)
		<tr>
			<td>{{ $student->id }}</td>
			<td>{{ $student->last_name }}</td>
			<td>{{ $student->first_name }}</td>
			<td>{{ $student->date_of_birth }}</td>
		</tr>
	@endforeach
	</tbody>
</table>
@endsection