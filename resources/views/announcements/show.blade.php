@extends('layouts.master')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-9">
                <h2>{{ $announcement->title }}</h2>
                <h3 class="text-muted">Posted: {{ $announcement->date }}</h3>
                <p>{{ $announcement->body }}</p>
            </div> <!-- ./col-md-9 -->

        </div>  <!-- ./row -->

    </div> <!-- ./container -->

@endsection
