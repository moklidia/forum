@extends('layout')
@section('title')
Add a student
@endsection
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css">
<h1 class="title" style="margin: 1em;">Add a Student</h1>
<form method="POST" action="{{ route ('students.store') }}">
  {{ csrf_field() }}
  <div class="field">
    <lable class="label" for="group_id">Group ID</lable>
    <div class="control">
      <input type="number" class="input" name="group_id" value="{{ old('group_id') }}" placeholder="Add Group ID">
    </div>
  </div>
  <div class="field">
    <label class="label" for="last_name">Last Name</label>
    <div class="control">
      <input type="text" class="input" name="last_name" value="{{ old('last_name') }}" placeholder="Add Last Name">
    </div>
  </div>
  <div class="field">
    <lable class="label" for="given_name">Given Name</lable>
    <div class="control">
      <input type="text" class="input" name="given_name" value="{{ old('given_name') }}" placeholder="Add Given Name">
    </div>
  </div>
  <div class=field>
    <label class="label" for="date_of_birth">Date of Birth</label>
    <div class="control">
      <input type="date" class="input" name="date_of_birth" value="{{ old('date_of_birth') }}">
    </div>
  </div>
  <div class="field">
    <div class="control">
      <button type="submit" class="button is-link">Add Student</button>
    </div>
  </div>
  @if ($errors->any())
  <div class="notification is-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  
</form>
@endsection