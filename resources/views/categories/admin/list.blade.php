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
            	<li style="margin: 1rem;"><a href="/admin/categories/{{ $category->id }}">{{ $category->name }}</a> 
                    <a href="/admin/categories/{{ $category->id }}/edit">ред.</a> 
                    <form style="display: inline;" action="/admin/categories/{{ $category->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary">видал.</button>
                    </form>
                </li>
			</ul>
        @endforeach
    </ul>
    <a href="/admin/categories/create">Створити нову категорію</a>
</body>
</html>