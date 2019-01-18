<!DOCTYPE html>
<html>
  <head>
    <title>Car {{ $movie->id }}</title>
  </head>
  <body>
    <h1>{{ $movie->title }}</h1>
    <ul>
      
      <li>Director: {{ $movie->director }}</li>
      <li>Rating: {{ $movie->rating }}</li>
      <li>Cast: {{ $movie->cast }}</li>
    </ul>
  </body>
</html>
