<!DOCTYPE html>
<html>
<head>
    <title>Список Категорій</title>
</head>
<body>
    <a href="/admin/categories/">Перейти в адмінку</a>
    @error('privileges')
    <span style="color: red;">{{ $message }}</span>
    @enderror
    <h1>Список категорій</h1>
    <div>
        @foreach ($categories as $category)
		<a href="{{ route('user.categories.show', compact('category'))}}" style="display: inline-block; width: 200px;">
            <img src={{ $category->getRandomPhoto() }} width="200" height="200"/>
            <div>{{ $category->name }}</div>
        </a>
        @endforeach
    </div>
</body>
</html>