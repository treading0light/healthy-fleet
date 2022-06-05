<!DOCTYPE html>
<html>
<head>
	@include('layouts.head')

	<title>Add Vehicle</title>
</head>
<body class="bg-slate-300">

	@include('layouts.header')

    @include('layouts.nav')

	<main class="w-11/12 bg-slate-400 m-auto rounded-2xl min-h-screen text-2xl flex flex-col items-center" id="main">

		<h1 class="font-bold mt-5">Add a new vehicle</h1>


		<div id="form_container" class="flex flex-col mt-5">

			<div id="error" class="text-center m-auto text-red-600 mb-10">
			@if($errors->any())
		    {!! implode('', $errors->all(':message')) !!}
			@endif
			</div>


			<div id="message" class="text-center m-auto text-green-600 mb-10">
			@if(isset($_SESSION['message']))
			{!! $_SESSION['message'] !!}
			@endif
			</div>

			<form id="truck_form" action="/setup/truck" method="POST" enctype="multipart/form-data" class="flex flex-col gap-2 items-center">
	            @csrf
	               
	            <h3>Truck Name: <input type="text" id="name" name="name" /></h3>

	            <h3>Year: <input type="text" id="year" name="year" /></h3>

	            <h3>Truck Make: <input type="text" id="make" name="make"/></h3>	

	            <h3>Truck Model: <input type="text" id="model" name="model" /></h3>	

	            <h3>Current Mileage: <input type="text" id="mileage" name="mileage" /></h3>	

	            @if ($departments != '')
	            
	            <h3>Department: <select name="department_id" id="department_id">
	                @foreach ($departments as $department)

	                <option value="{{ $department->id }}">{{ $department->name }}</option>
	                @endforeach
	            </select></h3>

	            @endif

	            <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
	            <h3>Upload Vehicle Photo: <input type="file" id="img" name="img" accept="image/*" /></h3>

	            <button type="submit" class="button mt-5 text-base">Submit</button>
	        </form>
        </div>

        <button id="done" class="button mt-10 text-base"><a href="{{ url('/fleet') }}">Done</a></button>
	</main>

	<script src="{{ asset('js/setup.js') }}"></script>

</body>
</html>