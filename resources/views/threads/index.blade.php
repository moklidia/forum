@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card card-default" style="margin-bottom: 1em">
                <div class="card-header">Forum threads</div>
                <div class="card-body">
                    @forelse ($threads as $thread)
                    <article>
                        <div class="level">
                        <h4 class="flex"><a href="{{ $thread->path() }}">{{ $thread->title }}</a></h4>
                        <strong><a href="{{ $thread->path() }}">{{ $thread->replies_count }} {{ str_plural('reply', $thread->replies_count) }}</a></strong>
                        </div>
                        <div class="body">{{ $thread->body }}</div>
                        <p><img src="{{ $thread->creator->avatar }}" style="width: 25px; height: 25px; float: left; border-radius: 50%; margin-right: 25px;"><a href="/threads?by={{ $thread->creator->name }}">{{ $thread->creator->name }}</a></p>
                    </article>

                    @empty
                    <p>There are no relevant results at this time.</p>
                    @endforelse
                    {{ $threads->links() }}
                </div>

            </div>
        </div>
    </div>

</div>
@endsection