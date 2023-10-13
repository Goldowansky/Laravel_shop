<!DOCTYPE html>
<html>
<head>
    <title>Додати Продукт</title>
</head>
<body>
    <h1>Додати продукт [{{ $category->name }}]</h1>
    <form action="{{ route('admin.categories.items.store', $category) }}" method="post" enctype="multipart/form-data">
		@csrf
        <div class="form-group">
            <div>
                <label for="photo">Фото</label>
                <input type="file" name="photo">
                @error('photo')
                <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <br>

            <label for="name">Назва виробу</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Введіть назву виробу">
            @error('name')
            <div style="color: red;">{{ $message }}</div>
            @enderror
            <br>

            <label for="name">Основна модифікація</label>
            <input type="text" name="modification" class="form-control" id="mod" placeholder="Введіть модифікацію">
            <br>
            
            <label for="name">Опис виробу</label>
            <input type="text" name="description" class="form-control" id="desc" placeholder="Введіть опис виробу">
            @error('description')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Створити</button>
    </form>
</body>
</html>