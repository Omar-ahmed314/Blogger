<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if (is_string($movie))
        <div class="error-card" style="max-width: 300px; margin: 20px auto; padding: 15px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); background-color: #fff;">
            <h2 style="color: #dc3545;">404 Not Found</h2>
            <p style="color: #666;">{{ $movie }}</p>
        </div>
    @elseif (is_array($movie))
        <div class="movie-card" style="max-width: 300px; margin: 20px auto; padding: 15px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); background-color: #fff;">
            <h2 style="color: #333; margin-bottom: 10px;">{{ $movie['name'] }}</h2>
            <p style="color: #666; font-size: 14px;">Release Date: {{ $movie['date'] }}</p>
        </div>
    @else
        <div class="error-card" style="max-width: 300px; margin: 20px auto; padding: 15px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); background-color: #fff;">
            <h2 style="color: #dc3545;">Invalid Data</h2>
            <p style="color: #666;">Unexpected data format received.</p>
        </div>
    @endif
</body>
</html>