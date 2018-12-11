@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card card-default" style="margin-bottom: 1em">
                <div class="card-header">Forum threads</div>
                <div class="card-body">
                    @foreach ($threads as $thread)
                    <article>
                        <div class="level">
                        <h4 class="flex"><a href="{{ $thread->path() }}">{{ $thread->title }}</a></h4>
                        <strong><a href="{{ $thread->path() }}">{{ $thread->replies_count }} {{ str_plural('reply', $thread->replies_count) }}</a></strong>
                        </div>
                        <div class="body">{{ $thread->body }}</div>
                        <p><a href="/threads?by={{ $thread->creator->name }}">{{ $thread->creator->name }}</a></p>
                    </article>

                    <hr>
                    @endforeach
                    {{ $threads->links() }}
                </div>
                
            </div>
        </div>
    </div>

</div>
@endsection