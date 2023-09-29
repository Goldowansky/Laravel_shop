<!DOCTYPE html>
<html>
<head>
    <title>Редагувати Продукт</title>
</head>
<body>
    <h1>Редагувати продукт</h1>
	@foreach ($item->photos as $photo) 
            <div style="display: inline-block; width: 200px; height: 250px;">
                <img src="{{ Storage::url('photos/'.$photo->src) }}" width="200" height="200">
                @if ($item->mainPhoto->id != $photo->id) 
                <form action="{{ route('admin.categories.items.photos.setMain', ['category' => $category, 'item' => $item, 'photo' => $photo]) }}" method="POST">
                    @csrf 
                    @method('PATCH')  
                    <button type="submit">Зробити основною</button>
                </form>    
                @endif 
            </div>
    @endforeach 
    <a href="{{ route('admin.categories.items.photos.create', ['category' => $category, 'item' => $item]) }}">Додати фото</a>
    <form action="{{ route('admin.categories.items.update', ['category' => $category, 'item' => $item]) }}" method="POST">
        @csrf
        @method('PUT') 
        <div class="form-group">
            <label for="name">Назва товару</label>
            <input type="text" name="name" id="name" value="{{ $item->name }}">
			
			<label for="category">Категорія</label>
            <select name="category_id" class="form-control" id="category">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $item->category_id ? 'selected="selected"' : '' }}>{{ $category->name }}</option>
                @endforeach 
            </select>
			
			<label for="name">Опис товару</label>
            <input type="text" name="description" id="desc" value="{{ $item->description }}">
        </div>
        <button type="submit" class="btn btn-primary">Редагувати продукт</button>
    </form>
</body>
</html>