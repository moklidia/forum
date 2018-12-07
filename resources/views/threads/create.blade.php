@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="card card-default">
        <div class="card-header">Create a New Thread</div>
        <div class="card-body">
          <form method="POST" action="/threads">
            @csrf
            <div class="form-group">
              <label for="channel_id">Choose a channel</label>
              <select name="channel_id" id="channel_id" class="form-control" required>
                <option value="">Choose one...</option>
                @foreach ($channels as $channel)
                <option value="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : '' }}>{{ $channel->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="title">Add a title</label>
              <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" required>
            </div>
            <div class="form-group">
              <label for="body"></label>
              <textarea name="body" id="body" class="form-control" rows="8" required>{{ old('body') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Publish</button>
          </form>
          @if ($errors->any())
          
            <ul class="notification is-danger">
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
       
          @endif
        </div>
        
      </div>
    </div>
  </div>
</div>
@endsection