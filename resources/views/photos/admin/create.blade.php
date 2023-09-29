<!DOCTYPE html>
<html>
<head>
    <title>Додати Фото</title>
</head>
<body>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h1>Додати фото</h1>
    <form action="{{ route('admin.categories.items.photos.store', ['category' => $category, 'item' => $item,]) }}" enctype="multipart/form-data" method="post">
		@csrf 
        <div class="form-group">
            <label for="photo">Фото</label>
            <input type="file" name="photo" id="photo">
        </div>
        <button type="submit" class="btn btn-primary">Додати</button>
    </form>
</body>
</html>