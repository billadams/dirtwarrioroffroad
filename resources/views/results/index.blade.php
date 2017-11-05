@extends ('layouts.master')

@section('head')

@endsection

@section ('content')

    <div class="container">

        <h2>Race Results</h2>
        <h3 class="text-muted">Event: Race Name</h3>
        <p class="text-muted">Date: August 5th, 2017</p>

        <div class="row">

            <div class="col-md-9">
                <table class="table table-striped table-responsive{-sm|-md}">
                    <thead>
                    <tr>
                        <th>Position</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>Joe</td>
                        <td>Dirt</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>John</td>
                        <td>Doe</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Big</td>
                        <td>Poppa</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Tim</td>
                        <td>McGraw</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>Jake</td>
                        <td>Hutson</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>Rory</td>
                        <td>Pickel</td>
                    </tr>
                    </tbody>
                </table>
            </div> <!-- ./col-md-9 -->

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