@extends('layout')

@section('content')
<h1 class="title" style="margin-top: 1em;">{{ $student->last_name }} {{ $student->given_name }}</h1>

<div class="content">{{ $student->date_of_birth }}</div>

<p>
	<a href="/students/{{ $student->id }}/edit">Edit</a>
</p>

@endsection