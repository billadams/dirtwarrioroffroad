<header class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1>Dirt Warrior Admin</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div>Hello, {{ Auth::user()->first_name }}</div>
            </div>
            <div class="col-md-12 pull-right">
                <a href="/admin/logout">Logout</a>
            </div>
        </div>
        </div>


</header>