@extends ('layouts.master')

@section('head')
    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
@endsection

@section ('content')

    <div class="banner-image">
        <img src="img/home-banner.jpg" class="img-fluid" alt="Banner Image" title="Banner Image">
    </div>

<div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
        <div class="col-lg-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="si-glyph-abacus">
                <use xlink:href="img/sprite.svg#si-glyph-calendar-1"/>
            </svg>
            <h4>Coming Up</h4>

            @if (!isset($upcoming_events) || count($upcoming_events) == 0)
                <p>There are no upcoming events. Check back soon!</p>
            @else
                <ul class="list-unstyled">
                    @foreach($upcoming_events as $upcoming_event)
                        <li>{{ $upcoming_event->title }} : {{ $upcoming_event->date->format('m/d/Y') }}</li>
                    @endforeach
                </ul>
                <p><a class="btn btn-secondary btn-cta" href="schedule" role="button" title="Full Schedule">Full Schedule
                        &raquo;</a></p>
            @endif

        </div><!-- /.col-lg-4 -->

        <div class="col-lg-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="si-glyph-abacus">
                <use xlink:href="img/sprite.svg#si-glyph-champion-cup"/>
            </svg>
            <h4>Results</h4>

            @if (!isset($latest_event))
                <p>There are no race results. Check back soon!</p>
            @else
                <h5 class="text-muted">{{ $latest_event->name }} : {{ $latest_event->date->format('m/d/Y') }}</h5>
                <ul class="list-unstyled">
                    @foreach($results as $result)
                        <li class="race-result">{{ OrdinalStringHelper::str_ordinal($loop->iteration) }} : {{ $result->first_name }} {{ $result->last_name }}</li>
                    @endforeach
                </ul>
                <p><a class="btn btn-secondary btn-cta" href="results" role="button" title="All Results">All Results &raquo;</a></p>
            @endif

        </div><!-- /.col-lg-4 -->

        <div class="col-lg-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="si-glyph-abacus">
                <use xlink:href="img/sprite.svg#si-glyph-louder-speaker"/>
            </svg>
            <h4>Announcements</h4>

            @if (!isset($announcements) || count($announcements) == 0)
                <p>There are no announcements. Check back soon!</p>
            @else
                <ul class="list-unstyled">
                    @foreach($announcements as $announcement)
                        <li>{{ $announcement->title }}</li>
                    @endforeach
                </ul>
                <p><a class="btn btn-secondary btn-cta" href="announcements" role="button" title="All Announcements">All
                        Announcements &raquo;</a></p>
            @endif
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
</div> <!-- /.container -->

@endsection

@section('footer')

@endsection