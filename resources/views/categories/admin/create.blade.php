<!DOCTYPE html>
<html>
<head>
    <title>Створити Категорію</title>
</head>
<body>
    <h1>Створити категорію</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.categories.store') }}" method="post">
		@csrf
        <div class="form-group">
            <label for="name">Назва категорії</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Введіть назву категорії">
        </div>
        <button type="submit" class="btn btn-primary">Створити</button>
    </form>
</body>
</html>