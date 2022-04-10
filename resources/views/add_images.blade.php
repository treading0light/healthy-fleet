<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Images</title>
	<link rel="stylesheet" type="text/css" href="{{ secure_asset('css/style.css') }}">
</head>

<body>

	@include('layouts.header')

	@include('layouts.nav')

	<main>

		<h2>Add images for {{ $truck->name }} </h2>

		<form action="/add_image/{{$truck->name}}" method="POST" enctype="multipart/form-data">
			@csrf

			<label for="img">Select image:</label>
			<input type="file" id="img" name="img" accept="image/*" />
			<button type="submit" class="button"></button>
			
		</form>

		@if($truck->images)

			<div class="img_scroller">

			@foreach($truck->images as $image)

			<div class="scroller_card">
				<img src="{{ $image }}">
			</div>

			@endforeach

			</div>

		@endif

		

	</main>

</body>
</html>