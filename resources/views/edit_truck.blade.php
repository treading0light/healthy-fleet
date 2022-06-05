<!DOCTYPE html>
<html>
<head>
	@include('layouts.head')
	<title>Edit {{ $truck->name }}</title>
</head>
<body class="bg-slate-300">
	@include('layouts.header')
	@include('layouts.nav')
	<main class="w-11/12 p-5 bg-slate-400 m-auto rounded-2xl min-h-screen text-2xl flex flex-col items-center">

		<h1 class="font-bold mt-5">Update vehicle information</h1>


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

			<form id="truck_form" action="{{ url('/fleet/edit/'.$truck->id) }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-2 items-center">
	            @csrf
	               
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

	            <button type="submit" class="button mt-5 text-base">Save</button>
	        </form>
        </div>
		
	</main>

</body>
</html>