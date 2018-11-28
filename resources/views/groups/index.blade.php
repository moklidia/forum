@extends('layout')

@section('title')
    Groups
@endsection

@section('content')

    <h1 style="margin-bottom: 1em;">Groups</h1>

    <form method="GET" action="/groups/create">
        <div class="field" style="margin-bottom: 1em;">
            <div class="control">
                <button type="submit" class="btn btn-light">Add Group</button>
            </div>
        </div>
    </form>

    <table class="table table-hover">
	<thead>
		<tr>
			<td scope="col">ID</td>
			<td scope="col">Name</td>
			<td scope="col">Description</td>
            <td scope="col"></td>
		</tr>
	</thead>
	<tbody>
	@foreach($groups as $group)
		<tr>
			<td>{{ $group->id }}</td>
			<td>{{ $group->name }}</td>
			<td>{{ $group->description }}</td>
            <td>
            	<form method="GET" action="/groups/{{ $group->id }}">
                    <div class="field">
                        <div class="control"style="margin-bottom: 1em;">
                            <button type="submit" class="btn btn-info">View Group Results</button>
                        </div>
                    </div>
                </form>

                <form method="GET" action="/groups/{{ $group->id }}/edit">
                    <div class="field">
                        <div class="control">
                            <button type="submit" class="btn btn-primary">Edit Group</button>
                        </div>
                    </div>
                </form>
            </td>
		</tr>
	@endforeach
	</tbody>
</table>

@endsection
