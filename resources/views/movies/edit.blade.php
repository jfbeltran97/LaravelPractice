<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('movies') }}">Movies</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('movies') }}">View all movies</a></li>
        <li><a href="{{ URL::to('movies/create') }}">Create a movie</a>
    </ul>
</nav>

<h1>Edit {{ $movie->title }}</h1>

<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}

{{ Form::model($movie, array('route' => array('movies.update', $movie->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('director', 'Director') }}
        {{ Form::text('director', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('plan', 'Plan') }}
        {{ Form::select('plan', array_combine($plans, $plans), null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('rating', 'Rating') }}
        {{ Form::select('rating', array_combine(range(1,5), range(1,5)), $movie->rating, array('class' => 'form-control')) }}
    </div>
    {{ Form::submit('Edit movie', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>