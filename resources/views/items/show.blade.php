<!DOCTYPE html>
<html>
<head>
    <title>{{ $item->name }}</title>
</head>
<body>
    <h1>{{ $item->name }}</h1>
		<p>[{{ $item->category->name }}]
		<p>{{ $item->description }}
</body>
</html>