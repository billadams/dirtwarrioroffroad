@extends('layouts.master')

@section('content')

    <div class="container">

        <h2>Announcements</h2>

        <div class="row">

            <div class="col-md-8">
                @if (!isset($announcements) || count($announcements) == 0)
                    <p>There are no announcements to display.</p>
                @else
                    @foreach ($announcements as $announcement)
                        <h3><a href="/announcements/{{ $announcement->id }}">{{ $announcement->title }}</a></h3>
                        <p>{!!nl2br(e($announcement->body))!!}</p>
                    @endforeach
                @endif
            </div> <!-- ./col-md-9 -->

            <div class="col-md-3 ml-md-auto">
                {{--<h4>Archive</h4>--}}
                {{--<ul>--}}
                    {{--<li><a href="#" title="2016">2016</a></li>--}}
                    {{--<li><a href="#" title="2015">2015</a></li>--}}
                    {{--<li><a href="#" title="2014">2014</a></li>--}}
                    {{--<li><a href="#" title="2013">2013</a></li>--}}
                {{--</ul>--}}
            </div>  <!-- ./col-md-3 -->

        </div> <!-- ./row -->

    </div> <!-- ./container -->

@endsection
