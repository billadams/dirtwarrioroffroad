@extends ('layouts.master')

@section('head')
    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
@endsection

@section ('content')

    <div class="banner-image">
        <img src="img/home-banner.jpg" class="img-fluid" alt="Banner Image" title="Banner Image">
    </div>

    <!-- Marketing messaging and featurettes
        ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
        <div class="col-lg-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="si-glyph-abacus">
                <use xlink:href="img/sprite.svg#si-glyph-calendar-1"/>
            </svg>
            <h2>Coming Up</h2>
            <p>Race Title 1 : Date</p>
            <p>Race Title 1 : Date</p>
            <p>Race Title 1 : Date</p>
            <p>Race Title 1 : Date</p>
            <p>Race Title 1 : Date</p>

            <p><a class="btn btn-secondary" href="schedule" role="button" title="Full Schedule">Full Schedule
                    &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="si-glyph-abacus">
                <use xlink:href="img/sprite.svg#si-glyph-champion-cup"/>
            </svg>

            <h2>Results</h2>
            <p>{{ str_ordinal(1) }} : Racer Name</p>
            <p>{{ str_ordinal(2) }} : Racer Name</p>
            <p>{{ str_ordinal(3) }} : Racer Name</p>
            <p><a class="btn btn-secondary" href="results" role="button" title="All Results">All Results &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="si-glyph-abacus">
                <use xlink:href="img/sprite.svg#si-glyph-louder-speaker"/>
            </svg>
            <h2>Announcements</h2>
            <p>Announcement Title : Date</p>
            <p>Announcement Title : Date</p>
            <p>Announcement Title : Date</p>
            <p>Announcement Title : Date</p>
            <p>Announcement Title : Date</p>
            <p><a class="btn btn-secondary" href="announcements" role="button" title="All Announcements">All
                    Announcements &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
</div> <!-- /.container -->

@endsection

@section('footer')

@endsection