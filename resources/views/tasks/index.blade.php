<!DOCTYPE html>
<html>
<head>
    <title>Users Tasks</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('tasks') }}">My Tasks</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('tasks') }}">View All My Tasks</a></li>
    </ul>
</nav>

<h1>All the Tasks</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>Number</td>
            <td>Title</td>
            <td>Description</td>
            <td>Priority</td>
            <td>Due Date</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @foreach($tasks as $key => $value)
        <tr>
            <td>{{ $value->number }}</td>
            <td>{{ $value->title }}</td>
            <td>{{ $value->description }}</td>
            <td>{{ $value->priority }}</td>
            <td>{{ $value->duedate }}</td>
            <td>
                <a class="btn btn-small btn-success" href="{{ URL::to('tasks/' . $value->id) }}">Show this task</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>