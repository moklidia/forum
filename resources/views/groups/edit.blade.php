@extends('layout')

@section('title')
    Edit a group
@endsection

@section('content')

    <h1 class="title" style="margin-bottom: 1em;">Edit Group</h1>

    <form method="POST" action="/groups/{{ $group->id }}" style="margin-bottom: 1em;">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="name">Group name</label>
            <input type="text" class="form-control" name="name" placeholder="Group Name" value="{{ $group->name }}">
        </div>
        <div class="form-group">
            <label for="description">Group description</label>
            <textarea name="description" class="form-control">{{ $group->description }}</textarea>
        </div>
        <div class="field">
            <div class="control">
                <button type="submit" class="btn btn-primary">Update Group</button>
            </div>
        </div>
    </form>

    <form method="POST" action="/groups/{{ $group->id }}">
        @method('DELETE')
        @csrf

        <div class="form-group">
            <div class="control">
                <button type="submit" class="button">Delete Group</button>
            </div>
        </div>
    </form>

@endsection
