@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-default" style="margin-bottom: 1em">
                <div class="card-header">
                    <img src="{{ $post->creator->avatar }}" style="width: 50px; height: 50px; float: left; border-radius: 50%; margin-right: 25px;"><a href="{{ route('profile', $post->creator) }}"> {{ $post->creator->name }}</a> posted:
                    {{ $post->title}}
                </div>
                <div class="card-body">
                    {{ $post->body}}
                </div>
                
            </div>
            
            @foreach ($postComments as $comment)
            <div class="card card-default" style="margin-bottom: 1em">
                <div class="card-header">
                    <div class="level">
                        <h6 class="flex"><img src="{{ $comment->owner->avatar }}" style="width: 50px; height: 50px; float: left; border-radius: 50%; margin-right: 25px;"><a href="{{ route('profile', $comment->owner) }}">{{ $comment->owner->name }}</a> said {{ $comment->created_at->diffForHumans() }}...</h6>
                        <div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{ $comment->body}}
                </div>
            </div>
            @foreach($comment->children as $subComment)
            <div class="card card-default" style="margin-bottom: 1em">
                <div class="card-header">
                    <div class="level">
                        <h6 class="flex"><img src="{{ $subComment->owner->avatar }}" style="width: 50px; height: 50px; float: left; border-radius: 50%; margin-right: 25px;"><a href="{{ route('profile', $subComment->owner) }}">{{ $subComment->owner->name }}</a> said {{ $subComment->created_at->diffForHumans() }}...</h6>
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
        