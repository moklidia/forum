@extends('layout')

@section('content')

<h1  style="margin-top: 1em;">Groups</h1>

<table class="table">
	<thead>
		<tr>
			<td scope="col">ID</td>
			<td scope="col">Name</td>
			<td scope="col">Description</td>
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