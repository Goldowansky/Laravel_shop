<!DOCTYPE html>
<html>
<head>
    <title>{{ $item->name }}</title>
</head>
<body>
	<div>
		<a href="{{ route('user.categories.index') }}">Категорії</a> >
		<a href="{{ route('user.categories.show', compact('category')) }}">{{ $category->name}}</a>
    <h1>{{ $item->name }}</h1>
	<div>
	@foreach ($item->photos as $photo) 
		<img src="{{ Storage::url('photos/'.$photo->src) }}" width="200" height="200">
	@endforeach 
	</div>
	<div style="margin: 1rem 0;">
	@foreach ($item->modifications as $mod) 
		<span style="padding: 0.5rem; border: 1px #CCC solid;">{{ $mod->label }}</span>
	@endforeach
	</div>
		<p>{{ $item->description }}
</body>
</html>