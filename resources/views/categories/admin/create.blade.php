<!DOCTYPE html>
<html>
<head>
    <title>Створити Категорію</title>
</head>
<body>
    <h1>Створити категорію</h1>
    <form action="{{ route('admin.categories.store') }}" method="post">
		@csrf
        <div class="form-group">
            <label for="name">Назва категорії</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Введіть назву категорії">
            @error('name')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Створити</button>
    </form>
</body>
</html>