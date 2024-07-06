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
            <th>product id</th>
            <th>quantity</th>
        </tr>
        @foreach ($data as $item)
        <tr>
            <td>{{$item->product_id}}</td>
            <td>{{$item->total_quantity}}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>
