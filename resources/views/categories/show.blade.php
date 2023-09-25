<!DOCTYPE html>
<html>
<head>
    <title>Список Товарів</title>
</head>
<body>
    <h1>Список товарів [{{$categoryName}}]</h1>
    <ul>
        @foreach ($items as $item)
            <a href="/user/items/{{ $item->id }}">
                <li>{{ $item->name }}
				<p>{{ $item->description }}
                </li></a>
        @endforeach
    </ul>
</body>
</html>