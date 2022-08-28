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


		<div id="form-container" class="flex flex-col mt-5">

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
	            <div class="flex flex-col gap-5 items-center lg:flex-row lg:justify-around lg:gap-10">

	            	<div class="flex flex-col gap-2">
	            		<h1 class="font-bold mb-2">Truck Details:</h1>
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
	            	</div>

	            	<div class="flex flex-col gap-2 items-center">

			        	<h1 class="font-bold">Mileage settings:</h1>

			        	<h3>Mileage auto update:</h3>

			        	<div class="flex gap-5">	        		
				        	<h3>off <input type="radio" name="mileage_update_method" value="off"></h3>
				        	<h3>average <input type="radio" name="mileage_update_method" value="average"></h3>
			        	</div>
			        	
			        	<h3 class="mt-5">Est. average miles per day</h3>
			        	<input type="number" name="average_mileage">
			        </div>
	            	
	            </div>   
	            

	            <button type="submit" class="button mt-5 text-base">Submit</button>
	        </form>
        </div>

        <button id="done" class="button mt-10 text-base"><a href="{{ url('/fleet') }}">Done</a></button>
	</main>

	<script src="{{ asset('js/setup.js') }}"></script>

</body>
</html>