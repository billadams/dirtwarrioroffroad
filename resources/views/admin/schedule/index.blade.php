@extends('admin.layouts.master')

@section('content')

    <div class="row">
        <div class="container add-new-announcement">
            <a href="/admin/schedule/create" class="btn btn-primary" title="Add new event">Add New</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div><a href="#" title="All announcements">All</a> ({{ count($schedule) }}) | <a href="#" title="Published announcements">Published</a> (130) | <a href="#" title="Draft announcements">Draft</a> (1)</div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <select title="Bulk actions">
                <option>Bulk Actions</option>
                <option value="delete">Delete</option>
            </select>
        </div>
        <div class="col-md-1">
            <button class="btn btn-default" title="Apply selected changes">Apply</button>
        </div>
        <div class="col-md-2">
            <select title="Schedule dates">
                <option value="all">All dates</option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Title</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schedule as $event)
                        <tr>
                            <td>
                                <input type="checkbox" title="{{ $event->id }}"/>
                            </td>
                            <td><a href="/admin/schedule/{{ $event->id }}/edit/" title="Edit {{ $event->title }}">{{ $event->title }}</a></td>
                            <td>{{ date($event->date) }}</td>
                            <td>
                                <form method="POST" action="/admin/schedule/{{ $event->id }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger" title="Delete {{ $event->title }}">Delete</button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection