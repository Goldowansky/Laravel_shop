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
            	<li style="margin: 1rem;"><a href="{{ route('admin.categories.show', $category) }}">{{ $category->name }}</a> 
                    <a href="{{ route('admin.categories.edit', $category) }}">ред.</a> 
                    <form style="display: inline;" action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary">видал.</button>
                    </form>
                </li>
			</ul>
        @endforeach
    </ul>
    <a href="{{ route('admin.categories.create') }}">Створити нову категорію</a>
</body>
</html>