@extends('admin.layouts.master')

@section('content')

    <h2>Edit Race Result</h2>

    <hr>

    <form method="POST" action="/admin/results/{{ $result->id }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group row">
            <label for="name" class="col-md-2 col-form-label">Name</label>
            <div class="col-md-10">
                <input type="text" class="form-control" value="{{ $result->name }}" id="name" name="name" autofocus>
            </div>
        </div>

        <div class="form-group row">
            <label for="date" class="col-2 col-form-label">Date</label>
            <div class="col-10">
                <input class="form-control" type="date" value="{{ $result->date }}" id="date" name="date">
            </div>
        </div>

        <div class="form-group row">
            <div class="offset-md-2 col-md-3">
                <a href="/admin/results/" class="btn btn-danger" title="Add new announcement">Cancel</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>

    </form>

@endsection