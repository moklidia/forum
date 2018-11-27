@extends('layout')

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

<table class="table table-hover">
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
			<td>
				<a href="/subjects/{{ $subject->id }}">
				{{ $subject->name }}</td>
            <td>
                <form method="GET" action="/subjects/{{ $subject->id }}/edit">
                    <div class="field">
                        <div class="control">
                            <button type="submit" class="btn btn-primary">Edit Subject</button>
                        </div>
                    </div>
                </form>
            </td>
			</a>
		</tr>
	@endforeach
	</tbody>
</table>

@endsection
