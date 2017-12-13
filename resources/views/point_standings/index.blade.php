@extends ('layouts.master')

@section('head')

@endsection

@section ('content')

    <div class="container">

        <div class="row">

            <div class="col-md-8">
                <h2>Point Standings</h2>
                <h3 class="text-muted">Year: 2017</h3>

                <table class="table table-striped table-responsive{-sm|-md}">
                    <thead>
                    <tr>
                        <th>Overall Place</th>
                        <th>Total Points</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>56</td>
                        <td>Joe</td>
                        <td>Dirt</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>53</td>
                        <td>John</td>
                        <td>Doe</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>45</td>
                        <td>Big</td>
                        <td>Poppa</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>39</td>
                        <td>Tim</td>
                        <td>McGraw</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>31</td>
                        <td>Jake</td>
                        <td>Hutson</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>16</td>
                        <td>Rory</td>
                        <td>Pickel</td>
                    </tr>
                    </tbody>
                </table>
            </div> <!-- ./col-md-8 -->

            <aside id="sidebar" class="col-md-3 ml-md-auto">

                {{--@if (!isset($most_recent_event))--}}
                {{--<p>There is no past history to display.</p>--}}
                {{--@else--}}
                <div id="past-results">
                    <h4>Archive</h4>
                    {{--<p>Current Year</p>--}}
                    {{--<ul class="list-unstyled">--}}
                    {{--@foreach ($past_results as $past_result)--}}
                    {{--<li><a href="/results/{{ $past_result->id }}" title="{{ $past_result->name }} - {{ $past_result->date->format('m/d/Y') }}">{{ $past_result->name }} - {{ $past_result->date->format('m/d/Y') }}</a></li>--}}
                    {{--@endforeach--}}
                    {{--</ul>--}}
                </div> <!-- /#past-results -->
                {{--@endif--}}

            </aside> <!-- ./col-md-3 -->

            {{--<div class="col-md-3 ml-md-auto">--}}
                {{--<h4>Archive</h4>--}}
                {{--<ul>--}}
                    {{--<li><a href="#" title="2016">2016</a></li>--}}
                    {{--<li><a href="#" title="2015">2015</a></li>--}}
                    {{--<li><a href="#" title="2014">2014</a></li>--}}
                    {{--<li><a href="#" title="2013">2013</a></li>--}}
                {{--</ul>--}}
            {{--</div>--}}

        </div> <!-- ./row -->

    </div> <!-- ./container -->

@endsection

@section('footer')

    <script>
        // var sideBar = $('#sidebar');
        var sideBarTop = $('#sidebar').offset().top;
        var sideBarLeft = $('#sidebar').offset().left;
        var sideBarWidth = $('#sidebar').innerWidth();
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

@endsection