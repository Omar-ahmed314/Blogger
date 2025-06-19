<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movies Land</title>
</head>
<body>
    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)
                <tr>
                    <td><a href="/movies/{{$movie['id']}}">{{ $movie['name'] }}</a></td>
                    <td>{{ $movie['date'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>