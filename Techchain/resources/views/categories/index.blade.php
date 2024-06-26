<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>List danh mục</h1>
    <a href="{{ route('categories.create') }}">Thêm mới</a>
    @if (session('msg'))
        <h2>{{ session('msg') }}</h2>
    @endif
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Action</th>
        </tr>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->updated_at }}</td>
                <td>
                    <a href="{{ route('categories.show', $item->id) }}">Show</a>
                    <a href="{{ route('categories.edit', $item->id) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $data->links() }}
</body>

</html>
