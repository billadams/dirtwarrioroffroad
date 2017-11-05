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
            <img class="rounded-circle"
                 src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                 alt="Generic placeholder image" width="140" height="140">
            <h2>Coming Up</h2>
            <p>Race Title 1 : Date</p>
            <p>Race Title 1 : Date</p>
            <p>Race Title 1 : Date</p>
            <p>Race Title 1 : Date</p>
            <p>Race Title 1 : Date</p>

            <p><a class="btn btn-secondary" href="#" role="button">Full Schedule &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <img class="rounded-circle"
                 src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                 alt="Generic placeholder image" width="140" height="140">
            <h2>Results</h2>
            <p>Position 1 : Racer Name</p>
            <p>Position 2 : Racer Name</p>
            <p>Position 3 : Racer Name</p>
            <p><a class="btn btn-secondary" href="#" role="button">All Results &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <img class="rounded-circle"
                 src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw=="
                 alt="Generic placeholder image" width="140" height="140">
            <h2>Announcements</h2>
            <p>Announcement Title : Date</p>
            <p>Announcement Title : Date</p>
            <p>Announcement Title : Date</p>
            <p>Announcement Title : Date</p>
            <p>Announcement Title : Date</p>
            <p><a class="btn btn-secondary" href="#" role="button">All Announcements &raquo;</a></p>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
</div> <!-- /.container -->

@endsection

@section('footer')

@endsection