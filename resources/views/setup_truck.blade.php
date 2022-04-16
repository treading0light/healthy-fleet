<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Vehicle</title>

	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/setup.css') }}">

	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>
<body>

	@include('layouts.header')

    @include('layouts.nav')

	<main class="flex-col" id="main">
		
		<h1 id="message"></h1>


		<div id="form_container" class="flex-col">

			@if($errors->any())
		    {!! implode('', $errors->all('<div id="error">:message</div>')) !!}
			@endif

			@if(isset($_SESSION['message']))
			<div>{!! $_SESSION['message'] !!}</div>
			@endif

			<form id="truck_form" action="/setup/truck" method="POST" enctype="multipart/form-data" >
	            @csrf
	               
	            <h3>Truck Name: <input type="text" id="name" name="name" /></h3>

	            <h3>Year: <input type="text" id="year" name="year" /></h3>

	            <h3>Truck Make: <input type="text" id="make" name="make"/></h3>	

	            <h3>Truck Model: <input type="text" id="model" name="model" /></h3>	

	            <h3>Current Mileage: <input type="text" id="mileage" name="mileage" /></h3>	

	            <h3>Department: <select name="department_id" id="department_id">
	                @foreach ($departments as $department)

	                <option value="{{ $department->id }}">{{ $department->name }}</option>
	                @endforeach
	            </select></h3>

	            <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
	            <h3>Upload Vehicle Photo: <input type="file" id="img" name="img" accept="image/*" /></h3>

	            <button type="submit" class="button">Submit</button>
	        </form>
        </div>

        <button id="done" class="button">Done</button>
	</main>

	<script src="{{ asset('js/setup.js') }}"></script>

</body>
</html>