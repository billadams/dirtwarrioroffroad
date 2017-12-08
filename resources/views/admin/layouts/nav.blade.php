<nav id="sidebar">
    <!-- Sidebar Header -->
    <div class="sidebar-header">
        <h1>Dirt Warrior Offroad</h1>
    </div>

    <!-- Sidebar Links -->
    <ul class="list-unstyled components">
        <li><a href="/admin" class="{{Request::is('admin') ? 'active' : ''}}">Home</a></li>
        <li><a href="/admin/announcements"
               class="{{Request::is('admin/announcements') ? 'active' : ''}}">Announcements</a></li>
        {{Request::is('/') ? 'active' : ''}}
        <li><a href="/admin/schedule" class="{{Request::is('admin/schedule') ? 'active' : ''}}">Race Schedule</a></li>
        <li><a href="/admin/classes" class="{{Request::is('admin/classes') ? 'active' : ''}}">Race Classes</a></li>
        <li><a href="/admin/results" class="{{Request::is('admin/results') ? 'active' : ''}}">Race Results</a></li>
        <li><a href="#">Point Standings</a>
        <li><a href="#">Photo Galleries</a></li>
    </ul>
</nav>