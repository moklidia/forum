@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="coll-md-10 col-md-offset-1">
			<img src="{{ $profileUser->avatar }}" class="img-circle" style="width: 150px; height: 150px; float: left; border-radius: 50%; margin-right: 25px; margin-bottom: 15px" />
			<h1>{{ $profileUser->name }}'s Profile</h1>
			<small>last seen {{ $profileUser->lastSeen() }}</small>
			@if($currentUser == $profileUser)
			<form enctype="multipart/form-data" action="/profiles/ . {{ $profileUser->name}}" method="POST">
				<label>Update Profile Image</label>
				<input type="file" name="avatar">
				<button type="submit" class="float-right btn btn-small btn-primary">Submit</button>
				@csrf
			</form>
			
			@endif
		</div>

	</div>
	@if ($errors->any())
          
            <ul class="alert alert-danger" role="alert">
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
       
          @endif
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