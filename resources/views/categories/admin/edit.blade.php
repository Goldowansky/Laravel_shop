<!DOCTYPE html>
<html>
<head>
    <title>Редагувати Категорію</title>
</head>
<body>
    <h1>Редагувати категорію</h1>
	<form action="/admin/categories/{{ $category->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Назва категорії</label>
            <input type="text" name="name" id="name" value="{{ $category->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Редагувати категорію</button>
    </form>
</body>
</html>