<!DOCTYPE html>
<html>
<head>
    <title>Редагувати Категорію</title>
</head>
<body>
    @livewire('rename-category', compact('category'))
    <a href={{ route('admin.categories.index') }}>Назад</a>
</body>
</html>