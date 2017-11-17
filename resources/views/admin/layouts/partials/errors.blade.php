@if (count($errors))
    <div class="form-group row">
        <div class="offset-md-2 col-md-10 alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif