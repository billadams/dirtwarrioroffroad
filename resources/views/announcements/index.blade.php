@extends('layouts.master')

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-8">
                <h2>Announcements</h2>

                <hr>

                @if (!isset($announcements) || count($announcements) == 0)
                    <p>There are no announcements to display.</p>
                @else
                    @foreach ($announcements as $announcement)
                        <div class="announcement">
                            <h3><!--<a href="/announcements/{{ $announcement->id }}">-->{{ $announcement->title }}<!--</a>--></h3>
                                <div class="text-muted date">Posted on: {{ $announcement->created_at->format('m/d/Y') }}</div>
                                <p>{!!nl2br(e($announcement->body))!!}</p>
                        </div>
                    @endforeach
                @endif

            </div> <!-- ./col-md-9 -->

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
