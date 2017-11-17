@extends('admin.layouts.master')

@section('content')

    <h2>Edit Event</h2>

    <hr>

    <form method="POST" action="/admin/schedule/{{ $event->id }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group row">
            <label for="title" class="col-md-2 col-form-label">Title</label>
            <div class="col-md-10">
                <input type="text" class="form-control" value="{{ $event->title }}" id="title" name="title" autofocus>
            </div>
        </div>

        <div class="form-group row">
            <label for="date" class="col-2 col-form-label">Date</label>
            <div class="col-10">
                <input class="form-control" type="date" value="{{ $event->date }}" id="date" name="date">
            </div>
        </div>

        <div class="form-group row">
            <label for="gate_open_time" class="col-2 col-form-label">Gate Open Time</label>
            <div class="col-10">
                <input class="form-control" type="time" value="{{ $event->gate_open_time }}" id="gate_open_time" name="gate_open_time">
            </div>
        </div>

        <div class="form-group row">
            <label for="practice_start_time" class="col-2 col-form-label">Practice Start Time</label>
            <div class="col-10">
                <input class="form-control" type="time" value="{{ $event->practice_start_time }}" id="practice_start_time"
                       name="practice_start_time">
            </div>
        </div>

        <div class="form-group row">
            <label for="rider_meeting_time" class="col-2 col-form-label">Riders Meeting Time</label>
            <div class="col-10">
                <input class="form-control" type="time" value="{{ $event->rider_meeting_time }}" id="rider_meeting_time"
                       name="rider_meeting_time">
            </div>
        </div>

        <div class="form-group row">
            <label for="race_start_time" class="col-2 col-form-label">Race Start Time</label>
            <div class="col-10">
                <input class="form-control" type="time" value="{{ $event->race_start_time }}" id="race_start_time" name="race_start_time">
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-md-2 col-form-label">Description</label>
            <div class="col-md-10">
                <input type="text" class="form-control" value="{{ $event->description }}" id="description" name="description">
            </div>
        </div>

        <div class="form-group row">
            <label for="directions" class="col-md-2 col-form-label">Directions</label>
            <div class="col-md-10">
                <select class="custom-select" id="directions" name="directions">
                    <option selected>Track directions</option>
                    <option value="1">Palmyra</option>
                    <option value="2">Abbott</option>
                    <option value="3">Yankton</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <div class="offset-md-2 col-md-3">
                <a href="/admin/schedule/" class="btn btn-danger" title="Add new announcement">Cancel</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>

    </form>

@endsection