<!DOCTYPE html>
<html>
  <head>
    <title>Top Ten</title>
  </head>
  <body>
    <h1>Top Ten Movies</h1>
    <ul>
    @foreach ($topTen as $movie)
        <li>{{ $movie->movie }}</li>
    @endforeach
    </ul>
  </body>
</html>
