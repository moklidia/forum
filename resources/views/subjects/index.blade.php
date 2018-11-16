@extends('layout')

@section('content')

<h1 style="margin-top: 1em;">Subjects</h1>
<table border style="width:50%">
	<thead>
		<tr>
			<td>ID</td>
			<td>Name</td>
		</tr>
	</thead>
	<tbody>
	@foreach($subjects as $subject)
		<tr>
			<td>{{ $subject->id }}</td>
			<td>
				<a href="/subjects/{{ $subject->id }}">
				{{ $subject->name }}</td>
			</a>
		</tr>
	@endforeach
	</tbody>
</table>

@endsection