@extends('admin.layouts.master')

@section('content')

    <h2>Add New Race Result</h2>

    <hr>

    <div class="offset-md-2">
        @include ('/admin.layouts.partials.errors')
    </div>

    <form method="POST" action="/admin/results" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group row">
            <label for="name" class="col-md-2 col-form-label">Name</label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="name" name="name" autofocus>
            </div>
        </div>

        <div class="form-group row">
            <label for="date" class="col-2 col-form-label">Date</label>
            <div class="col-md-3">
                <input class="form-control" type="date" value="{{ date('Y-m-d') }}" id="date" name="date">
            </div>
        </div>

        {{--<div class="form-group row">--}}
            {{--<div class="offset-md-2 col-md-2">--}}
                {{--<label class="btn btn-info btn-file">--}}
                    {{--Select CSV File <input type="file" name="file_upload" style="display: none;">--}}
                {{--</label>--}}
            {{--</div>--}}
        {{--</div>--}}

        <div class="form-group row">
            <div class="offset-md-2 col-md-3">
                <a href="/admin/results/" class="btn btn-secondary" title="Return to previous page">Cancel</a>
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </div>

    </form>

@endsection