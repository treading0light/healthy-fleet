<!DOCTYPE html>
<html>
<head>
	@include('layouts.head')
	<title>Edit {{ $truck->name }}</title>
</head>
<body class="bg-slate-300">

	@include('layouts.header')
	@include('layouts.nav')

	<main class="w-11/12 p-5 bg-slate-400 m-auto rounded-2xl min-h-screen text-2xl ">

		@if($errors->any())
		<div id="error" class="text-center m-auto text-red-600 mb-5">
		    {!! implode('', $errors->all(':message')) !!}
		</div>
		@endif

		@if(isset($_SESSION['message']))
		<div id="message" class="text-center m-auto text-green-600 mb-5">
			{!! $_SESSION['message'] !!}
		</div>
		@endif

		<form id="truck_form" action="{{ url('/fleet/edit/'.$truck->id) }}" method="POST" enctype="multipart/form-data" class="flex flex-col items-center">
            @csrf

            <div class="flex flex-col gap-5 items-center lg:flex-row lg:justify-around lg:gap-10">

            	<div class="flex flex-col gap-2 items-center">

	            	<h1 class="font-bold mt-5">Update vehicle information</h1>

		            <h3>Truck Name: <input type="text" id="name" name="name" value="{{ $truck->name }}" /></h3>

		            <h3>Year: <input type="text" id="year" name="year" value="{{ $truck->year }}" /></h3>

		            <h3>Truck Make: <input type="text" id="make" name="make" value="{{ $truck->make }}" /></h3>	

		            <h3>Truck Model: <input type="text" id="model" name="model" value="{{ $truck->model }}" /></h3>	

		            <h3>Current Mileage: <input type="text" id="mileage" name="mileage" value="{{ $truck->mileage }}" /></h3>	

		            @if ($departments != '')
		            
		            <h3>Department: <select name="department_id" id="department_id">
		                @foreach ($departments as $department)

		                <option value="{{ $department->id }}">{{ $department->name }}</option>
		                @endforeach
		            </select></h3>

		            @endif
		        </div>

		        <div class="flex flex-col gap-2 items-center">

		        	<h1 class="font-bold">Update mileage settings:</h1>

		        	<h3>Mileage auto update:</h3>

		        	<div class="flex gap-5">	        		
			        	<h3>off<input type="radio" name="mileage_update_method" value="off"></h3>
			        	<h3>average<input type="radio" name="mileage_update_method" value="average"></h3>
		        	</div>
		        	
		        	<h3 class="mt-5">Est. average miles per day</h3>
		        	<input type="number" name="average_mileage" value="{{ $truck->average_mileage }}">
		        </div>

            </div>
            
            <button type="submit" class="button mt-10 m-auto text-base">Save</button>         

        </form>
        
		
	</main>

</body>
</html>