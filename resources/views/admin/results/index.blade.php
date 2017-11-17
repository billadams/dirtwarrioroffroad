@extends('admin.layouts.master')

@section('content')

    <div class="row">
        <div class="container add-new">
            <a href="/admin/results/create" class="btn btn-primary" title="Add new race result">Add New</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div><a href="#" title="All race results">All</a> ({{ count($results) }}) | <a href="#" title="Published announcements">Published</a> (130) | <a href="#" title="Draft results">Draft</a> (1)</div>
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
            <select title="Announcement dates">
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
                        <th>Name</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $result)
                        <tr>
                            <td>
                                <input type="checkbox" title="{{ $result->id }}"/>
                            </td>
                            <td><a href="/admin/results/{{ $result->id }}/edit" title="Edit {{ $result->name }}">{{ $result->name }}</a></td>
                            <td>{{ date($result->date) }}</td>
                            <td>
                            <td><a href="/admin/resultpositions/{{ $result->id }}" class="btn btn-primary"
                                   title="Add new race result">Results</a>
                            </td>
                            <td>
                                <form method="POST" action="/admin/results/{{ $result->id }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger" title="Delete {{ $result->name }}">Delete</button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection