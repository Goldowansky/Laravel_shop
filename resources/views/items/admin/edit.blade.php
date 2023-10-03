<!DOCTYPE html>
<html>
<style>
    #photoSubmit {
        display: none;
    }
    #photo:checked + #photoSubmit {
        display: inline;
    }
</style>
<head>
    <title>Редагувати Продукт</title>
</head>
<body>
    @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
    <h1>Редагувати продукт</h1>
    <div>
	@foreach ($item->photos as $photo) 
            <div style="display: inline-block; width: 200px; height: 250px; vertical-align: top;">
                <img src="{{ Storage::url('photos/'.$photo->src) }}" width="200" height="200">
                @if ($item->mainPhoto->id != $photo->id) 
                <form action="{{ route('admin.categories.items.photos.setMain', ['category' => $category, 'item' => $item, 'photo' => $photo]) }}" method="POST" style="display: inline">
                    @csrf 
                    @method('PATCH')  
                    <button type="submit">Зробити основ.</button>
                </form>
                <form action="{{ route('admin.categories.items.photos.destroy', ['category' => $category, 'item' => $item, 'photo' => $photo]) }}" method="POST" style="display: inline">
                    @csrf 
                    @method('DELETE')  
                    <button type="submit">Видал.</button>
                </form>
                @endif 
            </div>
    @endforeach 
    <form action="{{ route('admin.categories.items.photos.store', ['category' => $category, 'item' => $item]) }}" method="POST" enctype="multipart/form-data" style="display: inline-block; width: 200px; height: 250px; vertocal-align: top;">
        @csrf 
        <label for="photo" style="cursor: pointer; display: inline-block; width: 200px; height: 200px; background: #EEE; color: #CCC; font-size: 7rem; border-radius: 1rem; text-align: center; line-height: 180px;">+</label>
        <input type="file" name="photo" id="photo" style="display: none;">
        <button type="submit" id="photoSubmit">Зберегти</button>
    </form>
    </div>
    
    <div style="margin: 1rem 0;">
        @foreach ($item->modifications as $modification)
        <form action="{{ route('admin.categories.items.modifications.destroy', compact('category', 'item', 'modification')) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <span style="padding: 0.5rem; border: #777 1px solid;">{{ $modification->label }}</span>
            <button type="submit" style="padding: 0.5rem;"">×</button>
        </form>
        @endforeach 
        <form action="{{ route('admin.categories.items.modifications.store', ['category' => $category, 'item' => $item]) }}" method="POST" style="display: inline;">
            @csrf 
            <input type="text" name="label" style="padding: 0.5rem; border: #777 1px solid; width: 5rem;" id="mod" placeholder="додати мод.">
            <button type="submit" style="padding: 0.5rem;"">+</button>
        </form>
    </div>
    {{-- <a href="{{ route('admin.categories.items.photos.create', ['category' => $category, 'item' => $item]) }}">Додати фото</a> --}}
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
<script>
    document.getElementById('photo').addEventListener('change', function () {
    var uploadButton = document.getElementById('photoSubmit');
    if (this.files.length > 0) {
        uploadButton.style.display = 'inline';
    } else {
        uploadButton.style.display = 'none';
    }
    });
</script>
</html>