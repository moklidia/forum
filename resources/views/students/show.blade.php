@extends('layouts.app')
@section('title')
Student Information
@endsection
@section('content')
<h1 class="title" style="margin: 1em;">{{ $student->last_name }} {{ $student->given_name }}</h1>
<div class="content">{{ $student->date_of_birth }}</div>
<p>
	<a href="/students/{{ $student->id }}/edit">Edit</a>
</p>
@endsection