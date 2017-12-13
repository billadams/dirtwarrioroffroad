<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Dirt Warrior Offroad</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
          integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/sticky-footer.css">
    <link rel="stylesheet" href="/../../css/admin.css">

    @yield('head')

</head>
<body>

        @if ($flash = session('message'))
            <div id="flash-message" class="alert alert-success" role="alert">
                {{ $flash }}
            </div> <!-- #/flash-message -->
        @endif

        <div class="container-fluid header-container">

            @include('admin.layouts.header')

        </div>

        <div class="container">

            <div class="row">

                <div class="col-md-3">

                    @include('admin.layouts.nav')

                </div>

                <div class="col-md-9">

                    @yield('content')

                </div>
            </div>

        </div>

        <div class="container-fluid footer-container footer">

            @include('admin.layouts.footer')

        </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
            integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
            integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
            crossorigin="anonymous"></script>

        <script>
            // var sideBar = $('#sidebar');
            var sideBarTop = $('#sidebar').offset().top;
            var sideBarLeft = $('#sidebar').offset().left;
            var sideBarWidth = $('#sidebar').width();
            $(window).scroll(function() {
                var currentScroll = $(window).scrollTop();
                if (currentScroll >= sideBarTop) {
                    $('#sidebar').css({
                        position: 'fixed',
                        top: '0',
                        left: sideBarLeft,
                        width: sideBarWidth
                    });
                } else {
                    $('#sidebar').css({
                        position: 'static',
                        width: sideBarWidth
                    });
                }
            });
        </script>

    @yield('footer')

</body>
</html>