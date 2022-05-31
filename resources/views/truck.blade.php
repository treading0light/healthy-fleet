<!DOCTYPE html>
<html>
<head>

	@include('layouts.head')
	
	<title> {{ $truck->name }} </title>

</head>

<body class="bg-slate-300">

	<main id="truck-main" class="bg-slate-400">

		@include('layouts.header')
		@include('layouts.nav')

		@include('layouts.truck_block')

		<div id="service-bar" class="flex rounded-xl items-center justify-center gap-5 mt-10">
			<h2 class=" text-2xl">Services:</h2>


			<div class="button">
				<p>Completed</p>
			</div>

			<div class="button">
				<p>Incomplete</p>
			</div>

			<div class="button">
				<a href="{{ url('create_service') }}/{{ $truck->id }}">Add new service</a>
			</div>
		</div>
			
		@if (isset($services))

		<table id="service-table" class="text-2xl m-auto mt-10 w-4/5 text-center">
			<tr>
				<th>Name:</th>
				<th>Due in:</th>
			</tr>
			@foreach ($services as $service)

				<!-- use service->status as classname for sorting purposes -->
				<tr class="{{ $service->status }}">
					<td>{{ $service->name }}</td>
					<td>{{ $service->mileage_due - $truck->mileage}} miles</td>
					<td><div class="button text-sm">View/Edit</div></td>
				</tr>

			@endforeach

		</table>

		@endif

	</main>

</body>
</html>