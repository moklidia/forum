@extends('layout')

@section('title')
    Edit a subject
@endsection

@section('content')

<h1 class="title" style="margin-bottom: 1em;">Edit Subject</h1>

<form method="POST" action="/subjects/{{ $subject->id }}" style="margin-bottom: 1em;">
  @method('PATCH')
  @csrf

  <div class="form-group">
    <label for="subject_name">Subject Name</label>

    <div class="control">
      <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ $subject->name }}">
    </div>
  </div>

  <div class="form-group">
    <div class="control">
      <button type="submit" class="btn btn-primary">Update Subject</button>
    </div>
  </div>
</form>

<form method="POST" action="/subjects/{{ $subject->id }}">
  @method('DELETE')
  @csrf

  <div class="form-group">
    <div class="control">
      <button type="submit" class="button">Delete Subject</button>
    </div>
  </div>
</form>

@endsection
