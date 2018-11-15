@extends('layout')

@section('content')

<h1>Subjects</h1>
<body>
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Subject
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
      <form method="post" action="{{ route('subjects.store') }}">
          <div class="form-group">
              @csrf
              <label for="subject_name">Add Subject Name:</label>
              <input type="text" class="form-control" name="add_subject_name"/>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
</body>
@endsection