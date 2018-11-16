@extends('layout')

@section('content')

<h1 class="title" style="margin-top: 1em;">Edit Student</h1>
<form method="POST" action="/students/{{ $student->id }}" style="margin-bottom: 1em;">
  @method('PATCH')
  @csrf

   <div class="field">
    <label class="label" for="group_id">Group ID</label>

    <div class="control">
      <input type="number" class="input" name="group_id" placeholder="Group ID" value="{{ $student->group_id }}">
    </div>
  </div>


  <div class="field">
    <label class="label" for="last_name">Last Name</label>

    <div class="control">
      <input type="text" class="input" name="last_name" placeholder="Last Name" value="{{ $student->last_name }}">
    </div>
  </div>


  <div class="field">
    <label class="label" for="given_name">Given Name</label>

    <div class="control">
      <input type="text" class="input" name="given_name" placeholder="Given Name" value="{{ $student->given_name }}">
    </div>
  </div>


  <div class="field">
    <div class="control">
      <button type="submit" class="button is-link">Update Student</button>
    </div>
  </div>
</form>


<form method="POST" action="/students/{{ $student->id }}">
  @method('DELETE')
  @csrf

  <div class="field">
    <div class="control">
      <button type="submit" class="button">Delete Student</button>
    </div>
  </div>
</form>

@endsection