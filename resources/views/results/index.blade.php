@extends('layout')

@section('content')

<h1 style="margin-top: 1em;">Results</h1>
<body>
	<table class="table">
		@foreach($students as $student)
			@if ($loop->first)
			    <thead>
				<tr>
					<td scope="col">Group ID</td>
					<td scope="col">Last name</td>
					<td scope="col">First name</td>
					@foreach($subjects as $subject)
						<td>{{ $subject->name }}</td>
					@endforeach
                    <td scope="col">Average</td>

				</tr>
				</thead>
			@endif
		<tbody>
			<tr>
				<td>{{ $student->group_id }}</td>
				<td>{{ $student->last_name }}</td>
				<td>{{ $student->given_name }}</td>
				@foreach($student->subjects as $subject)
                    <td>{{ $subject->pivot->points }}</td>
				@endforeach
                <td>{{ round($student->avgPoint) }}</td>

			</tr>
            @endforeach
		</tbody>
	</table>
</body>
@endsection
