<!DOCTYPE html>
<html>
<head>
    <title>Список Категорій</title>
</head>
<body>
    <h1>Список категорій</h1>
    <ul>
        @foreach ($categories as $category)
			<ul>
            	<li><a href="/admin/categories/{{ $category->id }}">{{ $category->name }}</a> <a href="/admin/categories/{{ $category->id }}/edit">ред.</a> <a href="/admin/categories/{{ $category->id }}/delete">видал.</a></li>
			</ul>
        @endforeach
    </ul>
    <a href="/admin/categories/create">Створити нову категорію</a>
</body>
</html>