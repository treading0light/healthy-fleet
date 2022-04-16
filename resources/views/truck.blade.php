<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> {{ $truck->name }} </title>

	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>

<body>

	<main>

		@include('layouts.header')
		@include('layouts.nav')

		@include('layouts.truck_block')

	</main>

</body>
</html>