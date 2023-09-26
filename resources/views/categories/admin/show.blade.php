<!DOCTYPE html>
<html>
<head>
    <title>Список Товарів</title>
</head>
<body>
    <h1>Список товарів [{{$categoryName}}]</h1>
    <ul>
        @foreach ($items as $item)
            	<li>{{ $item->name }}
				<p>{{ $item->category->name }}
				<p>{{ $item->description }}
                <p><a href="/admin/items/{{ $item->id }}/edit">редагувати</a>
                <form action="/admin/items/{{ $item->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">видалити</button>
                </form>
                </li>
        @endforeach
    </ul>
    <a href="/admin/items/create">Додати продукт</a>
</body>
</html>