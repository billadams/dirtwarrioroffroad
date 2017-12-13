@extends ('layouts.master')

@section('head')

@endsection

@section ('content')

    <div class="container">

        <div class="row">

            <div class="col-md-8 class-result">
                <h2>Race Results</h2>

                <hr>

                @if (!isset($most_recent_event))
                    <p>There are no race results to display.</p>
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
                                        <td>{{ OrdinalStringHelper::str_ordinal($result->overall) }}</td>
                                        <td>{{ OrdinalStringHelper::str_ordinal($result->moto_1) }}</td>
                                        <td>{{ OrdinalStringHelper::str_ordinal($result->moto_2) }}</td>
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

            <aside id="sidebar" class="col-md-3 ml-md-auto">

                    @if (!isset($most_recent_event))
                        <p>There is no past history to display.</p>
                    @else
                        <div id="past-results">
                            <h4>Past Results</h4>
                            {{--<p>Current Year</p>--}}
                            <ul class="list-unstyled">
                                @foreach ($past_results as $past_result)
                                    <li><a href="/results/{{ $past_result->id }}" title="{{ $past_result->name }} - {{ $past_result->date->format('m/d/Y') }}">{{ $past_result->name }} - {{ $past_result->date->format('m/d/Y') }}</a></li>
                                @endforeach
                            </ul>
                        </div> <!-- /#past-results -->
                @endif

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