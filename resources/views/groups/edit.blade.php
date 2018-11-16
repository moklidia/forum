@extends('layout')

@section('content')

<h1 class="title" style="margin-top: 1em;">Edit Group</h1>
<form method="POST" action="/groups/{{ $group->id }}" style="margin-bottom: 1em;">
  @method('PATCH')
  @csrf

  <div class="field">
    <label class="label" for="name">Group Name</label>

    <div class="control">
      <input type="text" class="input" name="name" placeholder="Group Name" value="{{ $group->name }}">
    </div>
  </div>

  <div class="field">
    <lable class="label" for="description">Description</lable>

    <div class="control">
      <textarea name="description" class="textarea">{{ $group->description }}</textarea>
    </div>
  </div>

  <div class="field">
    <div class="control">
      <button type="submit" class="button is-link">Update Group</button>
    </div>
  </div>
</form>

<form method="POST" action="/groups/{{ $group->id }}">
  @method('DELETE')
  @csrf

  <div class="field">
    <div class="control">
      <button type="submit" class="button">Delete Group</button>
    </div>
  </div>

</form>

@endsection