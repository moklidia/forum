@extends('layouts.app')
@section('content')
<a href="/threads"><button class="btn-default" style="margin: 1em;">All threads</button></a>
<div class="container" style="padding-bottom: 1em">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="#"> {{ $thread->creator->name }}</a> posted:
                    {{ $thread->title}}
                </div>
                <hr>
                <div class="panel-body">
                    {{ $thread->body}}
                </div>
                
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8 offset-md-2">
        @foreach ($thread->replies as $reply)
        @include ('threads.reply')
        @endforeach
        
    </div>
</div>
    @if(auth()->check())
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <form method="POST" action="{{ $thread->path().'/replies' }}">
                @csrf
                <div class="form-group">
                    <textarea name="body" id="body" class="form-control" placeholder="Have something to say?" rows="5"></textarea>
                    <button type="submit" class="btn btn-default">Post</button>
                </div>
            </form>
            
        </div>
    </div>
    @else
    <p class="text-center">Please <a href="{{ route('login') }}">sign in</a> to participate in this discussion</p>
    @endif
</div>
@endsection