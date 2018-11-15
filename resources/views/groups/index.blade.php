@extends('layout')

@section('content')

<h1>Groups</h1>

<table border style="width:50%">
	<thead>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Description</td>
		</tr>
	</thead>
	<tbody>
	@foreach($groups as $group)
		<tr>
			<td>{{ $group->id }}</td>
			<td>{{ $group->name }}</td>
			<td>{{ $group->description }}</td>
		</tr>
	@endforeach
	</tbody>
</table>
@endsection