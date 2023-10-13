<!DOCTYPE html>
<html>
<head>
    <title>Список Товарів</title>
</head>
<body>
    <h1>Список товарів [{{ $category->name }}]</h1>
    <ul>
        @foreach ($category->items as $item)
            	<li>{{ $item->name }}
				<p>{{ $item->category->name }}
				<p>{{ $item->description }}
                @can('be-admin')
                <p><a href="{{ route('admin.categories.items.edit', ['category' => $category, 'item' => $item]) }}">редагувати</a>
                <form action="{{ route('admin.categories.items.destroy', ['category' => $category, 'item' => $item]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">видалити</button>
                </form>
                @endcan
                </li>
        @endforeach
    </ul>
    @can('be-admin')
    <a href="{{ route('admin.categories.items.create', $category) }}">Додати продукт</a>
    @endcan
</body>
</html>