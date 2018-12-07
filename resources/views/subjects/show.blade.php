@extends('layouts.app')
@section('title')
Subject information
@endsection
@section('content')
<h1 class="title" style="margin: 1em;">{{ $subject->name }}</h1>
<p>
	<a href="/subjects/{{ $subject->id }}/edit">Edit</a>
</p>
@endsection