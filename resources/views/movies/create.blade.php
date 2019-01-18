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
        <a class="navbar-brand" href="{{ URL::to('movies') }}">Movie Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('movies') }}">View all movies</a></li>
        <li><a href="{{ URL::to('movies/create') }}">Create a Movie</a>
    </ul>
</nav>

<h1>Create a Movie</h1>

<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}

{{ Form::open(array('url' => 'movies')) }}

    <div class="form-group">
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title', Input::old('title'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('director', 'Director') }}
        {{ Form::text('director', Input::old('director'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('cast', 'Cast') }}
        {{ Form::text('cast', Input::old('cast'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('plan', 'Plan') }}
        {{ Form::select('plan', array('0'=>'basic','1'=>'standard', '2'=>'premium'), null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('rating', 'Rating') }}
        {{ Form::select('rating', array(1, 2, 3, 4, 5), Input::old('rating'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Create the movie', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>