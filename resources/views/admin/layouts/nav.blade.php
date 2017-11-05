<nav id="sidebar">
    <!-- Sidebar Header -->
    <div class="sidebar-header">
        <h1>Dirt Warrior Offroad</h1>
    </div>

    <!-- Sidebar Links -->
    <ul class="list-unstyled components">
        <li class="{{Request::is('/admin') ? 'active' : ''}}"><a href="/admin">Home</a></li>
        <li class="{{Request::is('/announcements') ? 'active' : ''}}"><a href="#">Announcements</a></li>
        <li class="{{Request::is('/schedules') ? 'active' : ''}}"><a href="#">Race Schedule</a></li>
        <li><a href="#">Race Results</a></li>
        <li><a href="#">Point Standings</a>
        <li><a href="#">Photo Galleries</a></li>
    </ul>
</nav>