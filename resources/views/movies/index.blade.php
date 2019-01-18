<!DOCTYPE html>
<html>
  <head>
    <title>Movies</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
  </head>
  <body>
    <h1>All movie records</h1>
    <ul>
        <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>ID</td>
                <td>Title</td>
                <td>Director</td>
                <td>Rating</td>
                <td>Plan</td>
            </tr>
        </thead>
        <tbody>
        @foreach($movies as $movie)
            <tr>
                <td>{{ $movie->id }}</td>
                <td>{{ $movie->title }}</td>
                <td>{{ $movie->director }}</td>
                <td>{{ $movie->rating }}</td>
                <td>{{ $movie->plan }}</td>

                <!-- we will also add show, edit, and delete buttons -->
                <td>

                    {{ Form::open(array('url' => 'movies/' . $movie->id, 'class' => 'pull-right')) }}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete movie', array('class' => 'btn btn-warning')) }}
                    {{ Form::close() }}
             
                    <a class="btn btn-small btn-success" href="{{ URL::to('movies/' . $movie->id) }}">Show movie</a>

                    <a class="btn btn-small btn-info" href="{{ URL::to('movies/' . $movie->id . '/edit') }}">Edit movie</a>

                </td>
            </tr>
        @endforeach
        </tbody>
        </table>
    </ul>
  </body>
</html>
