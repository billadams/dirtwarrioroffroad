@extends('admin.layouts.master')

@section('content')

    <div class="controls">

        <div class="row">
            <div class="col-md-3 add-new">
                <a href="/admin/results/create" class="btn btn-primary" title="Add new race result">Add New</a>
            </div>
        </div>

        <div class="row info">
            <div class="col-md-6">
                <div><a href="#" title="All race results">All</a> ({{ count($results) }}) | <a href="#" title="Published announcements">Published</a> (130) | <a href="#" title="Draft results">Draft</a> (1)</div>
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
                <button class="btn btn-default btn-sm" title="Apply selected changes">Apply</button>
            </div>
            <div class="col-md-2">
                <select title="Announcement dates">
                    <option value="all">All dates</option>
                </select>
            </div>
        </div>

    </div> <!-- /.controls -->

    @if (count($results) == 0)
        <p>There are no results to display.</p>
    @else
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Name</th>
                        <th>Date</th>
                        <th></th>
                        <th></th>
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
                            <td>{{ $result->date->format('m/d/Y') }}</td>
                            <td>
                                <a href="/admin/result_places/{{ $result->id }}" class="btn btn-primary btn-sm">Add Results</a>
                                {{--<form method="GET" action="/admin/results/add/{{ $result->id }}">--}}
                                    {{--{{ csrf_field() }}--}}
                                    {{--<input type="hidden" name="{{ $result->id }}">--}}
                                    {{--<button type="submit" class="btn btn-primary btn-sm" @if ($result->has_results ) disabled @endif--}}
                                    {{--title="Add results to {{ $result->name }}">Add Results--}}
                                    {{--</button>--}}
                                {{--</form>--}}
                            </td>
                            <td>
                                <form method="POST" action="/admin/results/clear/{{ $result->id }}">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-warning btn-sm" @if (!$result->has_results) disabled @endif
                                    title="Clear results from {{ $result->name }}">Clear Results
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form method="POST" action="/admin/results/{{ $result->id }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-outline-danger btn-sm"
                                            title="Delete {{ $result->name }}">Delete Result
                                    </button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection