@extends('layouts.app')
@section('content')
<div class="page-header">
	<h1>{{ $profileUser->name }}</h1>
	<small>since {{ $profileUser->created_at->diffForHumans() }}</small>
</div>
<div class="col-md-8">
	@foreach($threads as $thread)
	<div class="card card-default">
		<div class="card-header">
			<div class="level">
				<span class="flex">
					<a href="{{ route('profile', $thread->creator) }}"> {{ $thread->creator->name }}</a> posted:
					{{ $thread->title}}
				</span>
				<span>
					{{ $thread->created_at->diffForHumans() }}
				</span>
			</div>
		</div>
		<div class="card-body">
			{{ $thread->body }}
		</div>
	</div>
	@endforeach
	{{ $threads->links() }}
</div>
@endsection