<!DOCTYPE html>
<html>
<head>
    <title>Редагувати Продукт</title>
</head>
<body>
    <h1>Редагувати продукт</h1>
	<form action="/admin/items/{{ $item->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Назва товару</label>
            <input type="text" name="name" id="name" value="{{ $item->name }}">
			
			<label for="category">Категорія</label>
            <select name="category_id" class="form-control" id="category">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $item->category_id ? 'selected="selected"' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
			
			<label for="name">Опис товару</label>
            <input type="text" name="description" id="desc" value="{{ $item->description }}">
        </div>
        <button type="submit" class="btn btn-primary">Редагувати продукт</button>
    </form>
</body>
</html>