@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-default bg-info" style="margin-bottom: 1em">
                <div class="card-header">
                    <img src="{{ $post->creator->avatar }}" style="width: 50px; height: 50px; float: left; border-radius: 50%; margin-right: 25px;"><a href="{{ route('profile', $post->creator) }}"> {{ $post->creator->name }}</a> posted:
                    {{ $post->title}}
                </div>
                <div class="card-body">
                    {{ $post->body}}
                </div>
                
            </div>
            @if(auth()->check())
            
            <form method="POST" action="/posts/{{$post->id}}/comments">
                @csrf
                <div class="form-group">
                    <textarea name="body" id="body" class="form-control" placeholder="Write a comment" rows="3"></textarea>
                    <button type="submit" class="btn btn-default">Comment</button>
                </div>
            </form>
            
            @else
            @endif
            
            @foreach ($postComments as $comment)
            <div class="card card-default bg-secondary" style="margin-bottom: 1em">
                <div class="card-header">
                    <div class="level">
                        <h6 class="flex"><img src="{{ $comment->owner->avatar }}" style="width: 40px; height: 40px; float: left; border-radius: 50%; margin-right: 25px;"><a href="{{ route('profile', $comment->owner) }}">{{ $comment->owner->name }}</a> said {{ $comment->created_at->diffForHumans() }}...</h6>
                        <div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{ $comment->body}}
                </div>
            </div>
            @if(auth()->check())
            
            <form method="POST" action="/posts/{{$post->id}}/{{$comment->id}}/nestedcomments">
                @csrf
                <div class="form-group">
                    <textarea name="body" id="body" class="form-control" placeholder="Write a reply" rows="1"></textarea>
                    <button type="submit" class="btn btn-default">Reply</button>
                </div>
            </form>
            
            @else
            @endif
            @foreach($comment->children as $subComment)
            <div class="card card-default" style="margin-bottom: 1em">
                <div class="card-header">
                    <div class="level">
                        <h6 class="flex"><img src="{{ $subComment->owner->avatar }}" style="width: 30px; height: 30px; float: left; border-radius: 50%; margin-right: 25px;"><a href="{{ route('profile', $subComment->owner) }}">{{ $subComment->owner->name }}</a> said {{ $subComment->created_at->diffForHumans() }}...</h6>
                        <div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{ $subComment->body}}
                </div>
            </div>
            @endforeach
            @endforeach
        </div>
    </div>
</div>
@endsection