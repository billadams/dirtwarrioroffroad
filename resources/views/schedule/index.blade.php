@extends ('layouts.master')

@section('head')

@endsection

@section ('content')

    <div class="container">

        <h2>Race Schedule</h2>

        @if (count($race_events) == 0)
            <p>There are no scheduled upcoming events.</p>
        @else
            <table class="table table-striped table-responsive{-sm|-md}">
                <thead>
                <tr>
                    <th>Event Name</th>
                    <th>Date</th>
                    <th>Gates Open</th>
                    <th>Practice Starts</th>
                    <th>Riders Meeting</th>
                    <th>Races Start</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($race_events as $event)
                    <tr>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->date->format('m/d/Y') }}</td>
                        <td>{{ date('g:i A', strtotime($event->gate_open_time)) }}</td>
                        <td>{{ date('g:i A', strtotime($event->practice_start_time)) }}</td>
                        <td>{{ date('g:i A', strtotime($event->rider_meeting_time)) }}</td>
                        <td>{{ date('g:i A', strtotime($event->race_start_time)) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif


    </div> <!-- ./container -->

@endsection

@section('footer')

@endsection