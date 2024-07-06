<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <table class='table'>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>customer_id</th>
            <th>status</th>
            <th>total</th>
        </tr>
        @foreach ($data as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->customer_name}}</td>
            <td>{{$item->customer_id}}</td>
            <td>{{$item->status}}</td>
            <td>{{$item->total}}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>
