@extends('layout')

@section('content')
<h1 class="title" style="margin-top: 1em;">{{ $group->name }}</h1>

<div class="content">{{ $group->description }}</div>

<p>
	<a href="/groups/{{ $group->id }}/edit">Edit</a>
</p>

@endsection