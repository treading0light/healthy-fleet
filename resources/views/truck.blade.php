<!DOCTYPE html>
<html>
<head>

	@include('layouts.head')
	
	<title> {{ $truck->name }} </title>

</head>

<body>

	<main>

		@include('layouts.header')
		@include('layouts.nav')

		@include('layouts.truck_block')

	</main>

</body>
</html>