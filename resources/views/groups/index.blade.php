@extends('layouts.app')
@section('title')
Groups
@endsection
@section('content')
<h1 style="margin-bottom: 1em;">Groups</h1>
<form method="GET" action="/groups/create">
  <div class="field" style="margin-bottom: 1em;">
    <div class="control">
      <button type="submit" class="btn btn-light">Add Group</button>
    </div>
  </div>
</form>
<table class="table table-hover" style="text-align: center;">
  <thead>
    <tr>
      <td scope="col">ID</td>
      <td scope="col">Name</td>
      <td scope="col">Description</td>
      <td scope="col">See Results</td>
      <td scope="col">Actions</td>
    </tr>
  </thead>
  <tbody>
    @foreach($groups as $group)
    <tr>
      <td>{{ $group->id }}</td>
      <td>{{ $group->name }}</td>
      <td>{{ $group->description }}</td>
      <td><a href="/groups/{{ $group->id }}" class="btn btn-info d-inline-block" style="width: 100px;">Results</a></td>
      <td style="white-space: nowrap">
        
        <a href="/groups/{{ $group->id }}/edit" class="btn btn-primary d-inline-block" style="width: 8em;">Edit</a>
        <form action="/groups/{{ $group->id }}" method="POST" class="d-inline-block">
          {{ csrf_field() }}
          {{ method_field('DELETE') }}
          <button type="submit" class="btn btn-danger" style="width:8em">
          Delete
          </button>
        </form>
      </td>
    </tr>
    @endforeach
    {{ $groups->links() }}
  </tbody>
</table>
@endsection