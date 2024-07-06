<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Create danh mục</h1>
    <form action="{{ route('brands.store') }}" method="post" enctype="multipart/form-data">
        @csrf

      <div class="m-3">
        <label for="name">Name</label>
        <input type="text" name="name">
      </div>
      <div class="m-3">
        <label for="image">Image</label>
        <input type="file" name="image">
      </div>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
