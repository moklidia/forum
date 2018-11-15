@extends('layout')

@section('content')

<h1>Students</h1>

<body>
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Student
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
      <form method="post" action="{{ route('students.store') }}">
          <div class="form-group">
              @csrf
              <label for="last_name">Add Last Name:</label>
              <input type="text" class="form-control" name="add_last_name"/>
          </div>
          <div class="form-group">
              <label for="given_name">Add Given Name :</label>
              <input type="text" class="form-control" name="add_given_name"/>
          </div>
          <div class="form-group">
              <label for="date_of_birth">Add Date of Birth :</label>
              <input type="text" class="form-control" name="add_date_of_birth"/>
          </div>
          <div class="form-group">
              @csrf
              <label for="group_id">Add Group ID:</label>
              <input type="text" class="form-control" name="add_group_id"/>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
</body>
@endsection