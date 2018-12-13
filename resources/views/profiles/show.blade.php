@extends('layouts.app')
@section('content')
<div class="page-header">
	<h1>{{ $profileUser->name }}'s Profile</h1>
	<small>since {{ $profileUser->created_at->diffForHumans() }}</small>
</div>
<div class="container">
	<div class="row">
		<div class="coll-md-10 col-md-offset-1">
			<img src="{{ $profileUser->avatarDir() }}" class="img-circle" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px;" />
			
		</div>
	</div>
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