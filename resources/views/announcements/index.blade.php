<!DOCTYPE html>

<html>

<head>

    <title>Test</title>

</head>

<body>

<h1>Text</h1>

<ul>
    @foreach ($announcements as $announcement)
        <li><a href="{{ $announcement->id }}">{{ $announcement->body }}</a></li>
    @endforeach

</ul>
</body>

</html>
