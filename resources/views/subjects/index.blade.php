@extends('layout')

@section('content')

<h1>Subjects</h1>
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
			<td>{{ $subject->name }}</td>
		</tr>
	@endforeach
	</tbody>
</table>

@endsection