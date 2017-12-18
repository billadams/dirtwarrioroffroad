@extends('admin.layouts.master')

@section('content')

    <h2>Adding Results To {{ $result->name }}</h2>
    <h3>Event Date: {{ $result->date->format('m/d/Y') }}</h3>

    <hr>

    <div class="offset-md-2">
        @include ('/admin.layouts.partials.errors')
    </div>

    <form method="POST" action="/admin/result_places" enctype="multipart/form-data">
        {{ csrf_field() }}

        <input type="hidden" name="id" value="{{ $result->id }}">
        <div class="form-group row">
            <div class="col-md-2">
                <label class="btn btn-info btn-file">
                    Select CSV File <input type="file" name="file_upload" style="display: none;">
                </label>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-3">
                <a href="/admin/results/" class="btn btn-secondary" title="Return to previous page">Cancel</a>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </div>

    </form>

@endsection