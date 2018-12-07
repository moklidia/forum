@extends('layouts.app')
@section('title')
Subjects
@endsection
@section('content')
<h1 style="margin-bottom: 1em;">Subjects</h1>
<form method="GET" action="/subjects/create">
	<div class="field" style="margin-bottom: 1em;">
		<div class="control">
			<button type="submit" class="btn btn-light">Add Subject</button>
		</div>
	</div>
</form>
<table class="table table-hover" style="text-align: center;">
	<thead>
		<tr>
			<td scope="col">ID</td>
			<td scope="col">Name</td>
			<td scope="col"></td>
		</tr>
	</thead>
	<tbody>
		@foreach($subjects as $subject)
		<tr>
			<td>{{ $subject->id }}</td>
			<td>{{ $subject->name }}</td>
			<td style="white-space: nowrap">
				<a href="/subjects/{{ $subject->id }}/edit" class="btn btn-primary d-inline-block;" style="width: 8em;">Edit</a>
				<form action="/subjects/{{ $subject->id }}" method="POST" class="d-inline-block">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<button type="submit" class="btn btn-danger" style="width: 8em">
					Delete
					</button>
				</form>
			</td>
		</a>
	</tr>
	@endforeach
</tbody>
</table>
@endsection