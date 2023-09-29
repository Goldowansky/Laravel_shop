<!DOCTYPE html>
<html>
<head>
    <title>Список Товарів</title>
</head>
<body>
    <h1>Список товарів [{{ $category->name }}]</h1>
    <ul>
        @foreach ($category->items as $item)
            <a href="/user/items/{{ $item->id }}">
                <img src={{ $item->getPhotoUrl() }} width="200" height="200"/>
                <li>{{ $item->name }}
				<p>{{ $item->description }}
                </li></a>
        @endforeach
    </ul>
</body>
</html>