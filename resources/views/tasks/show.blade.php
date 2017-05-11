<!DOCTYPE html>
<html>
<head>
    <title>Show a Task - Test</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('tasks') }}">Tasks</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('tasks') }}">View All Tasks</a></li>
    </ul>
</nav>

<h1>Showing {{ $task->title }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $task->title }}</h2>
        <p>
            <strong>Description:</strong> {{ $task->description }}<br>
            <strong>Priority:</strong> {{ $task->priority }}
        </p>
    </div>

</div>
</body>
</html>