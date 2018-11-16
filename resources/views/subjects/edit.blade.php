@extends('layout')

@section('content')

<h1 class="title" style="margin-top: 1em;">Edit Subject</h1>
<form method="POST" action="/subjects/{{ $subject->id }}" style="margin-bottom: 1em;">
  @method('PATCH')
  @csrf


  <div class="field">
    <label class="label" for="subject_name">Subject Name</label>

    <div class="control">
      <input type="text" class="input" name="last_name" placeholder="Last Name" value="{{ $subject->name }}">
    </div>
  </div>

  <div class="field">
    <div class="control">
      <button type="submit" class="button is-link">Update Subject</button>
    </div>
  </div>
</form>

<form method="POST" action="/subjects/{{ $subject->id }}">
  @method('DELETE')
  @csrf

  <div class="field">
    <div class="control">
      <button type="submit" class="button">Delete Subject</button>
    </div>
  </div>
</form>

@endsection