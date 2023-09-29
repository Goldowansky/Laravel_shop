<!DOCTYPE html>
<html>
<head>
    <title>Додати Продукт</title>
</head>
<body>
    <h1>Додати продукт</h1>
    <form action="/admin/items/" method="post">
		@csrf
        <div class="form-group">
            
            <label for="name">Назва виробу</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Введіть назву виробу">
            
            <label for="category">Категорія</label>
            <select name="category_id" class="form-control" id="category">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <label for="name">Опис виробу</label>
            <input type="text" name="description" class="form-control" id="desc" placeholder="Введіть опис виробу">
        </div>
        <button type="submit" class="btn btn-primary">Створити</button>
    </form>
</body>
</html>