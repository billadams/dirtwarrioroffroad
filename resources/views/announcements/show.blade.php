@extends('layout')

@section('content')

<h2>{{ $announcement->title }}</h2>
<p>{{ $announcement->body }} - Date: {{ $announcement->date }}</p>

@endsection
