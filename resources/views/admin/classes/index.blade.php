@extends('admin.layouts.master')

@section('content')

    <div class="row">
        <div class="container add-new">
            <a href="/admin/classes/create" class="btn btn-primary" title="Add new announcement">Add New</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div><a href="#" title="All announcements">All</a> ({{ count($classes) }}) | <a href="#" title="Published announcements">Published</a> (130) | <a href="#" title="Draft announcements">Draft</a> (1)</div>
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
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Class Name</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($classes as $class)
                        <tr>
                            <td>
                                <input type="checkbox" title="{{ $class->id }}"/>
                            </td>
                            <td><a href="/admin/classes/{{ $class->id }}/edit" title="Edit {{ $class->name }}">{{ $class->name }}</a></td>
                            <td>
                                <form method="POST" action="/admin/classes/{{ $class->id }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger" title="Delete {{ $class->name }}">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection