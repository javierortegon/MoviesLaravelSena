<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h3>Hola desde el PDF !!</h3>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>User</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($movies as $movie)
            <tr>
                <td>{{ $movie->name }}</td>
                <td>{{ $movie->description }}</td>
                <td>{{ $movie->user }}</td>
                <td>{{ $movie->status }}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
