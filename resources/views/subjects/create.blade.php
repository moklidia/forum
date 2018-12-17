@extends('layouts.app')
@section('title')
Add a subject
@endsection
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css">
<h1 class="title" style="margin: 1em;">Add a Subject</h1>
<form method="POST" action="{{ route ('subjects.store') }}">
  @csrf
  <div class="field">
    <label class="label" for="name">Subject Name</label>
    <div class="control">
      <input type="text" class="input" name="name" placeholder="Add Subject Name">
    </div>
  </div>
  <div class="field">
    <div class="control">
      <button type="submit" class="button is-link">Add Subject</button>
    </div>
  </div>
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  
</form>
@endsection