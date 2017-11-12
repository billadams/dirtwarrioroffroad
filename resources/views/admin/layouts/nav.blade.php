<nav id="sidebar" class="">
    <!-- Sidebar Header -->
    <div class="sidebar-header">
        <h1>Dirt Warrior Offroad</h1>
    </div>

    <!-- Sidebar Links -->
    <ul class="list-unstyled components">
        <li class="{{Request::is('/admin') ? 'active' : ''}}"><a href="/admin">Home</a></li>
        <li class="{{Request::is('/admin/announcements') ? 'active' : ''}}"><a href="/admin/announcements">Announcements</a></li>
        <li class="{{Request::is('/schedules') ? 'active' : ''}}"><a href="/admin/schedule">Race Schedule</a></li>
        <li><a href="#">Race Results</a></li>
        <li><a href="#">Point Standings</a>
        <li><a href="#">Photo Galleries</a></li>
    </ul>
</nav>