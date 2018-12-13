<div class="card card-default" style="margin-bottom: 1em">
	<div class="card-header">
		<div class="level">
			<h5 class="flex"><a href="#">{{ $reply->owner->name }}</a> said {{ $reply->created_at->diffForHumans() }}...</h5>
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