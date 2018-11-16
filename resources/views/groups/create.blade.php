@extends('layout')

@section('content')
<h1 class="title" style="margin-top: 1em;">Add a Group</h1>
<form method="POST" action="{{ route ('groups.store') }}">
  {{ csrf_field() }}

  <div class="field">
    <label class="label" for="name">Group Name</label>

    <div class="control">
      <input type="text" class="input" name="name" placeholder="Add Group Name">
    </div>
  </div>

  <div class="field">
    <lable class="label" for="description">Group Description</lable>

    <div class="control">
      <textarea name="description" class="textarea" placeholder="Add Group Description"></textarea>
    </div>
  </div>
  <div class="field">
    <div class="control">
      <button type="submit" class="button is-link">Add Group</button>
    </div>
  </div>
</form>
@endsection