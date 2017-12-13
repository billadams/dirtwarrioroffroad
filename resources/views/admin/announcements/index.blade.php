@extends('admin.layouts.master')

@section('content')

    <div class="controls">

        <div class="row">
            <div class="col-md-3 add-new">
                <a href="/admin/announcements/create" class="btn btn-primary" title="Add new announcement">Add New</a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div><a href="#" title="All announcements">All</a> ({{ count($announcements) }}) | <a href="#" title="Published announcements">Published</a> (130) | <a href="#" title="Draft announcements">Draft</a> (1)</div>
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
                <button class="btn btn-default btn-sm" title="Apply selected changes">Apply</button>
            </div>
            <div class="col-md-2">
                <select title="Announcement dates">
                    <option value="all">All dates</option>
                </select>
            </div>
        </div>

    </div> <!-- /.controls -->

    @if (count($announcements) == 0)
        <p>There are no announcements to display.</p>
    @else
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Title</th>
                        <th>Published</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($announcements as $announcement)
                        <tr>
                            <td>
                                <input type="checkbox" title="{{ $announcement->id }}"/>
                            </td>
                            <td><a href="/admin/announcements/{{ $announcement->id }}/edit" title="Edit {{ $announcement->title }}">{{ $announcement->title }}</a></td>
                            <td>{{ date($announcement->updated_at->format('m/d/Y')) }}</td>
                            <td>
                                <form method="POST" action="/admin/announcements/{{ $announcement->id }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-outline-danger btn-sm"
                                            title="Delete {{ $announcement->title }}">Delete
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