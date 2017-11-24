@extends ('layouts.master')

@section('head')

@endsection

@section ('content')

    <div class="container">

        <h2>Race Results</h2>
        <h3 class="text-muted">Event: {{ $most_recent_event->name }}</h3>
        <p class="text-muted">Date: {{ $most_recent_event->date->format('F d, Y') }}</p>

        <div class="row">

            @foreach ($classes as $class)
                <div class="col-md-9">
                    <h4>{{ $class->name }}</h4>
                    <table class="table table-striped table-responsive{-sm|-md}">
                        <thead>
                        <tr>
                            <th>Overall</th>
                            <th>Moto 1</th>
                            <th>Moto 2</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                        </tr>
                        </thead>
                        @foreach ($results as $result)
                            <tbody>
                                @if ($result->class_id == $class->class_id)
                                    <tr>{{ $result->overall }}</tr>
                                    <tr>{{ $result->moto_1 }}</tr>
                                    <tr>{{ $result->moto_2 }}</tr>
                                    <tr>{{ $result->first_name }}</tr>
                                    <tr>{{ $result->last_name }}</tr>
                                @endif
                            </tbody>
                        @endforeach
                    </table>
                </div> <!-- ./col-md-9 -->
            @endforeach

            <div class="col-md-3">
                <h4>Past Results</h4>
                <p>Current Year</p>
                <ul>
                    <li><a href="#" title="Homer, 07/18/17">Homer, 07/18/17</a></li>
                    <li><a href="#" title="Abbot, 07/25/17">Abbot, 07/25/17</a></li>
                    <li><a href="#" title="Yankton, 07/31/17">Yankton, 07/31/17</a></li>
                    <li><a href="#" title="Friend, 08/03/17">Friend, 08/03/17</a></li>
                </ul>
            </div> <!-- ./col-md-3 -->

        </div> <!-- ./row -->

    </div> <!-- ./container -->

@endsection

@section('footer')

@endsection