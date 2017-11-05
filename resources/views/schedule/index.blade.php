@extends ('layouts.master')

@section('head')

@endsection

@section ('content')

    <div class="container">

        <h2>Race Schedule</h2>

        <table class="table table-striped table-responsive{-sm|-md}">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Event Name</th>
                    <th>Directions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>September 12th, 2017</td>
                    <td>Abbot</td>
                    <td><a href="#">Abbot directions</a></td>
                </tr>
                <tr>
                    <td>September 27th, 2017</td>
                    <td>Homer</td>
                    <td><a href="#">Homer directions</a></td>
                </tr>
                <tr>
                    <td>November 3rd, 2017</td>
                    <td>Yankton</td>
                    <td><a href="#">Yankton directions</a></td>
                </tr>
            </tbody>
        </table>

    </div> <!-- ./container -->

@endsection

@section('footer')

@endsection