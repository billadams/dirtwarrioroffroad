@extends('admin.layouts.master')

@section('content')

    <h2>Results for {{ $result->name }}</h2>
    <div class="text-muted">{{ $result->date }}</div>
    <div class="row">
        <div class="container add-new">
            <a href="/admin/results/create" class="btn btn-primary" title="Add new race result">Add New</a>
        </div>
    </div>

    <div class="row info">
        <div class="col-md-6">
            <div><a href="#" title="All race results">All</a> ({{ count($result) }}) | <a href="#" title="Published announcements">Published</a> (130) | <a href="#" title="Draft results">Draft</a> (1)</div>
        </div>
    </div>

    <div class="row bulk-actions">
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
            <select title="Announcement dates">
                <option value="all">All dates</option>
            </select>
        </div>
    </div>

    @foreach ($classes as $class)

    @endforeach
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Overall</th>
                    </tr>
                </thead>
                <tbody>
                    {{--@foreach ($results as $result)--}}
                        {{--<tr>--}}
                            {{--<td>--}}
                                {{--<input type="checkbox" title="{{ $result->id }}"/>--}}
                            {{--</td>--}}
                            {{--<td><a href="/admin/results/{{ $result->id }}/edit" title="Edit {{ $result->name }}">{{ $result->name }}</a></td>--}}
                            {{--<td>{{ date($result->date) }}</td>--}}
                            {{--<td>--}}
                            {{--<td><a href="/admin/results"--}}
                                {{--<form method="POST" action="/admin/results/{{ $result->id }}">--}}
                                    {{--{{ csrf_field() }}--}}
                                    {{--{{ method_field('DELETE') }}--}}

                                    {{--<button type="submit" class="btn btn-danger" title="Delete {{ $result->name }}">Delete</button>--}}

                                {{--</form>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                    {{--@endforeach--}}
                </tbody>
            </table>
        </div>
    </div>

@endsection