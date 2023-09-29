<!DOCTYPE html>
<html>
<head>
    <title>Додати Продукт</title>
</head>
<body>
    <h1>Додати продукт</h1>
    <form action="{{ route('admin.categories.items.store', $category) }}" method="post">
		@csrf
        <div class="form-group">
            <label for="photo">Фото</label>
            <input type="file" name="photo">

            <label for="name">Назва виробу</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Введіть назву виробу">
            
            <label for="category">Категорія</label>
            <input type="text" value="{{ $category->name }}" disabled>

            <label for="name">Опис виробу</label>
            <input type="text" name="description" class="form-control" id="desc" placeholder="Введіть опис виробу">
        </div>
        <button type="submit" class="btn btn-primary">Створити</button>
    </form>
</body>
</html>