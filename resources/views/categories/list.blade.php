<!DOCTYPE html>
<html>
<head>
    <title>Список Категорій</title>
</head>
<body>
    <a href="/admin/categories/">Перейти в адмінку</a>
    <h1>Список категорій</h1>
    <ul>
        @foreach ($categories as $category)
			<ul>
            	<li><a href="/user/categories/{{ $category->id }}"/>{{ $category->name }}</a></li>
			</ul>
        @endforeach
    </ul>
</body>
</html>