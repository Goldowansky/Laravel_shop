<!DOCTYPE html>
<html>
<head>
    <title>Список Товарів</title>
</head>
<body>
    <h1>Список товарів</h1>
    <ul>
        @foreach ($items as $item)
            	<li>{{ $item->name }}
				<p>{{ $item->category->name }}
				<p>{{ $item->description }}
                <p><a href="/admin/item/{{ $item->id }}/edit">редагувати</a>
                <p><a href="/admin/item/{{ $item->id }}/remove">видалити</a>
                </li>
        @endforeach
    </ul>
</body>
</html>