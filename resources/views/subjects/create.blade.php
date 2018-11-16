@extends('layout')

@section('content')
<h1 class="title" style="margin-top: 1em;">Add a Subject</h1>
<form method="POST" action="{{ route ('subjects.store') }}">
  {{ csrf_field() }}

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
</form>
@endsection