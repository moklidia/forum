<div class="card card-default" style="margin-bottom: 1em">
	<div class="card-header">
		<div class="level">
			<h6 class="flex"><img src="{{ $reply->owner->avatar }}" style="width: 50px; height: 50px; float: left; border-radius: 50%; margin-right: 25px;"><a href="{{ route('profile', $reply->owner) }}">{{ $reply->owner->name }}</a> said {{ $reply->created_at->diffForHumans() }}...</h6>
			<div>

				<form method="POST" action="/replies/{{ $reply->id }}/favorites">
					@csrf
					@if ($reply->isFavorited())
					{{ method_field('DELETE') }}
					@endif
					<button type="submit" class="btn btn-default">
						{{ $reply->favorites_count }} {{ str_plural('like', $reply->favorites_count) }}</button>
				</form>
			</div>
		</div>
	</div>
	<div class="card-body">
		{{ $reply->body}}
	</div>
</div>