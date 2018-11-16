@extends('layout')

@section('content')

<h1  style="margin-top: 1em;">Groups</h1>

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
			<td>
				<a href="/groups/{{ $group->id }}">
					{{ $group->id }}
				</a>
				</td>
			<td>{{ $group->name }}</td>
			<td>{{ $group->description }}</td>
		</tr>
	@endforeach
	</tbody>
</table>
@endsection