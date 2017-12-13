@extends('admin.layouts.master')

@section('content')

    <h2>Create Announcement</h2>

    <hr>

    <div class="offset-md-2">
        @include ('/admin.layouts.partials.errors')
    </div>

    <form method="POST" action="/admin/announcements">
        {{ csrf_field() }}

        <div class="form-group row">
            <label for="title" class="col-md-2 col-form-label">Title</label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="title" name="title" autofocus>
            </div>
        </div>

        <div class="form-group row">
            <label for="body" class="col-md-2 col-form-label">Body</label>
            <div class="col-md-10">
                <textarea class="form-control" id="body" rows="15" name="body"></textarea>
            </div>
        </div>

        <div class="form-group row">
            <div class="offset-md-2 col-md-3">
                <a href="/admin/announcements/" class="btn btn-secondary" title="Return to previous page">Cancel</a>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </div>

    </form>

@endsection