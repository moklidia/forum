@extends('layouts.app')
@section('title')
Add a group
@endsection
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css"
  xmlns:style="http://www.w3.org/1999/xhtml">
  <h1 class="title" style="margin: 1em;">Add a Group</h1>
  <form method="POST" action="{{ route ('groups.store') }}">
    {{ csrf_field() }}
    <div class="field">
      <label class="label" for="name">Group Name</label>
      <div class="control">
        <input type="text" class="input" name="name" value="{{ old('name') }}" placeholder="Add Group Name">
      </div>
    </div>
    <div class="field">
      <lable class="label" for="description">Group Description</lable>
      <div class="control">
        <textarea class="textarea" name="description" placeholder="Add Group Description">{{ old('description') }}</textarea>
      </div>
    </div>
    <div class="field">
      <div class="control">
        <button type="submit" class="button is-link">Add Group</button>
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