@extends('layout')

@section('title')
    Edit a student
@endsection

@section('content')

<h1 class="title" style="margin-bottom: 1em;">Edit Student</h1>

<form method="POST" action="/students/{{ $student->id }}" style="margin-bottom: 1em;">
  @method('PATCH')
  @csrf

   <div class="form-group">
    <label for="group_id">Group ID</label>

    <div class="control">
      <input type="number" class="form-control" name="group_id" placeholder="Group ID" value="{{ $student->group_id }}">
    </div>
  </div>


  <div class="form-group">
    <label for="last_name">Last Name</label>

    <div class="control">
      <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ $student->last_name }}">
    </div>
  </div>


  <div class="form-group">
    <label for="given_name">Given Name</label>

    <div class="control">
      <input type="text" class="form-control" name="given_name" placeholder="Given Name" value="{{ $student->given_name }}">
    </div>
  </div>


  <div class="form-group">
    <div class="control">
      <button type="submit" class="btn btn-primary">Update Student</button>
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
