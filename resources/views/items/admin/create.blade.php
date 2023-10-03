<!DOCTYPE html>
<html>
<head>
    <title>Додати Продукт</title>
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
    <h1>Додати продукт [{{ $category->name }}]</h1>
    <form action="{{ route('admin.categories.items.store', $category) }}" method="post" enctype="multipart/form-data">
		@csrf
        <div class="form-group">
            <div>
                <label for="photo">Фото</label>
                <input type="file" name="photo">
            </div>

            <label for="name">Назва виробу</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Введіть назву виробу">

            <label for="name">Основна модифікація</label>
            <input type="text" name="modification" class="form-control" id="mod" placeholder="Введіть модифікацію">
            
            <label for="name">Опис виробу</label>
            <input type="text" name="description" class="form-control" id="desc" placeholder="Введіть опис виробу">
        </div>
        <button type="submit" class="btn btn-primary">Створити</button>
    </form>
</body>
</html>