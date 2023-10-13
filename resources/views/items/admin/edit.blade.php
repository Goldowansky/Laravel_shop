<!DOCTYPE html>
<html>
<style>
    input[type="radio"]:checked + button{
        display: none;
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
	@livewire('photo-controll', compact('item'))
    </div>
    
    <div style="margin: 1rem 0;">
        @livewire('modification-controll', compact('item'))
    </div>
    @livewire('change-item-name-and-description', compact('item'))
    <a href={{ route('admin.categories.show', compact('category')) }}>Назад</a>
</body>
</html>