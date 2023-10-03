<!DOCTYPE html>
<html>
<head>
    <title>Список Товарів</title>
</head>
<body>
    <div>
        <a href="{{ route('user.categories.index') }}">Категорії</a>
    </div>
    <h1>Список товарів [{{ $category->name }}]</h1>
    <div>
        @foreach ($category->items as $item) 
        <a href="{{ route('user.categories.items.show', compact('category', 'item'))}}" style="display: inline-block; width: 200px;">
            <img src={{ $item->getPhotoUrl() }} width="200" height="200"/>
            <div>{{ $item->name }}</div>
        </a>
        @endforeach
    </div>
</body>
</html>