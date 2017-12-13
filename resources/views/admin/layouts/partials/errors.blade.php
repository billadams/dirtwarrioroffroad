@if (count($errors))
    {{--<div class="offset-md-2 col-md-10">--}}

        <div class="alert alert-danger">
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>

    {{--</div>--}}
@endif