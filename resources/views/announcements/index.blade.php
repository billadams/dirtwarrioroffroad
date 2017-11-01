@extends('layouts.master')

@section('content')

<h1>Announcements</h1>

<ul>
    @foreach ($announcements as $announcement)
        <li><a href="{{ $announcement->id }}">{{ $announcement->title }}</a></li>
    @endforeach

</ul>

@endsection
