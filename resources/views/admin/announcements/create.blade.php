@extends('admin.layouts.master')

@section('content')

    <h2>Create Announcement</h2>

    <hr>

    <form method="POST" action="/admin/announcements">
        {{ csrf_field() }}

        <div class="form-group row">
            <label for="title" class="col-md-2 col-form-label">Title</label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="title" name="title">
            </div>
        </div>

        <div class="form-group row">
            <label for="body" class="col-md-2 col-form-label">Body</label>
            <div class="col-md-10">
                <textarea class="form-control" id="body" rows="15" name="body"></textarea>
            </div>
        </div>

        <div class="form-group row">
            {{--<div class="offset-md-2 col-md-2">--}}
                {{--<button type="submit" class="btn btn-danger">Cancel</button>--}}
            {{--</div>--}}
            {{--<div class="col-md-2">--}}
                {{--<button type="submit" class="btn btn-warning">Save Draft</button>--}}
            {{--</div>--}}
            <div class="offset-md-2 col-md-2">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </div>
    </form>

@endsection