@extends('admin.layouts.master')

@section('content')

    <div class="row">
        <div class="container add-new-announcement">
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
                        <th>Title</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($announcements as $announcement)
                        <tr>
                            <td>
                                <input type="checkbox" title="{{ $announcement->id }}"/>
                            </td>
                            <td>{{ $announcement->title }}</td>
                            <td>{{ date($announcement->updated_at) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection