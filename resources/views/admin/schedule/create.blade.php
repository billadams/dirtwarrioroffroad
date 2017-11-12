@extends('admin.layouts.master')

@section('content')

    <h2>Create Race Event</h2>

    <hr>

    <form method="POST" action="/admin/schedule">
        {{ csrf_field() }}

        <div class="form-group row">
            <label for="title" class="col-md-2 col-form-label">Title</label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="title" name="title">
            </div>
        </div>

        <div class="form-group row">
            <label for="date" class="col-2 col-form-label">Date</label>
            <div class="col-10">
                <input class="form-control" type="date" value="2011-08-19" id="date">
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-md-2 col-form-label">Description</label>
            <div class="col-md-10">
                <input type="text" class="form-control" id="description" name="description">
            </div>
        </div>

        <div class="form-group row">
            <label for="directions" class="col-md-2 col-form-label">Directions</label>
            <div class="col-md-10">
                <select class="custom-select" id="directions">
                    <option selected>Track directions</option>
                    <option value="1">Palmyra</option>
                    <option value="2">Abbott</option>
                    <option value="3">Yankton</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="offset-md-2 col-md-2">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </div>
    </form>

@endsection