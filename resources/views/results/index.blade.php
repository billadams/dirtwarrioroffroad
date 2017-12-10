@extends ('layouts.master')

@section('head')

@endsection

@section ('content')

    <div class="container">

        <h2>Race Results</h2>

        <div class="row">
            <div class="col-md-8 class-result">
                @if (!isset($most_recent_event))
                    <p>There are no race results to display</p>
                @else
                    <h3 class="text-muted">Event: {{ $most_recent_event->name }}</h3>
                    <p class="text-muted">Date: {{ $most_recent_event->date->format('F d, Y') }}</p>

                    @foreach ($classes as $class)
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
                            <tbody>
                            @foreach ($results as $result)
                                @if ($result->class_id == $class->class_id)
                                    <tr>
                                        <td>{{ str_ordinal($result->overall) }}</td>
                                        <td>{{ str_ordinal($result->moto_1) }}</td>
                                        <td>{{ str_ordinal($result->moto_2) }}</td>
                                        <td>{{ $result->first_name }}</td>
                                        <td>{{ $result->last_name }}</td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    @endforeach
                @endif
            </div> <!-- ./col-md-8 -->

            <aside class="col-md-3 ml-md-auto">
                @if (!isset($most_recent_event))
                    <p>There is no past history to display.</p>
                @else
                    <h4>Past Results</h4>
                    <p>Current Year</p>
                    <ul class="list-unstyled">
                        <li><a href="#" title="Homer, 07/18/17">Homer, 07/18/17</a></li>
                        <li><a href="#" title="Abbot, 07/25/17">Abbot, 07/25/17</a></li>
                        <li><a href="#" title="Yankton, 07/31/17">Yankton, 07/31/17</a></li>
                        <li><a href="#" title="Friend, 08/03/17">Friend, 08/03/17</a></li>
                    </ul>
                @endif

            </aside> <!-- ./col-md-3 -->

        </div> <!-- ./row -->

    </div> <!-- ./container -->

@endsection

@section('footer')

@endsection