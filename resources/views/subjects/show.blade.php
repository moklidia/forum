@extends('layout')

@section('content')
<h1 class="title" style="margin-top: 1em;">{{ $subject->name }}</h1>

<p>
	<a href="/subjects/{{ $subject->id }}/edit">Edit</a>
</p>

@endsection