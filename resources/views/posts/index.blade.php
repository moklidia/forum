@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card card-default" style="margin-bottom: 1em">
                <div class="card-header">Posts</div>
                <div class="card-body">
                    @foreach ($posts as $post)
                    <article>
                        <div class="level">
                        <h4 class="flex"><a href="#">{{ $post->title }}</a></h4>
                        </div>
                        <div class="body">{{ $post->body }}</div>
                        <p><img src="{{ $post->creator->avatar }}" style="width: 25px; height: 25px; float: left; border-radius: 50%; margin-right: 25px;"><a href="/threads?by={{ $post->creator->name }}">{{ $post->creator->name }}</a></p>
                    </article>

                    <hr>
                    @endforeach
                    {{ $posts->links() }}
                </div>
                
            </div>
        </div>
    </div>

</div>
@endsection