<!DOCTYPE html>
<html>
<head>
	@include('layouts.setup_head')

	<title>Add Vehicle</title>
</head>
<body>

	@include('layouts.header')

    @include('layouts.nav')

	<main class="flex-col" id="main">


		<div id="form_container" class="flex-col">
			<div id="error">
			@if($errors->any())
		    {!! implode('', $errors->all(':message')) !!}
			@endif
			</div>


			<div id="message">
			@if(isset($_SESSION['message']))
			{!! $_SESSION['message'] !!}
			@endif
			</div>

			<form id="truck_form" action="/setup/truck" method="POST" enctype="multipart/form-data" >
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

	            <button type="submit" class="button">Submit</button>
	        </form>
        </div>

        <button id="done" class="button"><a href="{{ url('/fleet') }}">Done</a></button>
	</main>

	<script src="{{ asset('js/setup.js') }}"></script>

</body>
</html>