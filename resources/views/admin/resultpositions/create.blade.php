@extends('admin.layouts.master')

@section('content')

    <h2>Create Race</h2>

    <hr>

    @include ('/admin.layouts.partials.errors')

    <form method="POST" action="/admin/results">
        {{ csrf_field() }}

        <div class="form-group row">
            <label for="name" class="col-md-2 col-form-label">Name</label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="name" name="name" autofocus>
            </div>
        </div>

        <div class="form-group row">
            <label for="date" class="col-2 col-form-label">Date</label>
            <div class="col-10">
                <input class="form-control" type="date" value="{{ date('Y-m-d') }}" id="date" name="date">
            </div>
        </div>

        <div class="form-group row">
            <div class="offset-md-2 col-md-2">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </div>
    </form>

@endsection