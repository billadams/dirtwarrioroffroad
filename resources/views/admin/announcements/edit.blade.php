@extends('admin.layouts.master')

@section('content')

    <h2>Edit Announcement</h2>

    <hr>

    <form method="POST" action="/admin/announcements/{{ $announcement }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group row">
            <label for="title" class="col-md-2 col-form-label">Title</label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="title" name="title" value="{{ $announcement->title }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="body" class="col-md-2 col-form-label">Body</label>
            <div class="col-md-10">
                <textarea class="form-control" id="body" rows="15" name="body">{{ $announcement->body }}</textarea>
            </div>
        </div>

        <div class="form-group row">
            <div class="offset-md-2 col-md-3">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <a href="/admin/announcements/" class="btn btn-danger" title="Add new announcement">Cancel</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>

    </form>

@endsection