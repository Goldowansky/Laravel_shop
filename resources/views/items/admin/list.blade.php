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
                <p><a href="{{ route('admin.items.edit', $item) }}">редагувати</a>
                <form action="{{ route('admin.items.destroy', $item) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">видалити</button>
                </form>
                </li>
        @endforeach
    </ul>
</body>
</html>