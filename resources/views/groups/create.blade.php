@extends('layout')

@section('content')

<h1>Groups</h1>

<body>
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Group
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('groups.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Add Name:</label>
              <input type="text" class="form-control" name="add_name"/>
          </div>
          <div class="form-group">
              <label for="description">Add Description :</label>
              <input type="text" class="form-control" name="add_description"/>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
</body>
@endsection