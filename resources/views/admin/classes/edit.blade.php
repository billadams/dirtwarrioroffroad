@extends('admin.layouts.master')

@section('content')

    <h2>Edit Class</h2>

    <hr>

    <form method="POST" action="/admin/classes/{{ $class->id }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group row">
            <label for="name" class="col-md-2 col-form-label">Class Name</label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ $class->name }}">
            </div>
        </div>

        <div class="form-group row">
            <div class="offset-md-2 col-md-3">
                <a href="/admin/announcements/" class="btn btn-danger" title="Add new announcement">Cancel</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>

    </form>

@endsection