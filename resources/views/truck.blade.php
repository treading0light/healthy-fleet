<!DOCTYPE html>
<html>
<head>

	@include('layouts.head')
	
	<title> {{ $truck->name }} </title>

</head>

<body class="bg-slate-300">

	@include('layouts.header')

	@include('layouts.nav')

	<main id="truck-main" class="w-11/12 p-5 bg-slate-400 m-auto rounded-2xl min-h-screen text-2xl flex flex-col items-center">

		@include('layouts.truck_block')

		<div id="service-bar" class="flex flex-wrap rounded-xl items-center justify-center gap-5 mt-10">
			<h2 class=" text-2xl">Services:</h2>


			<p class="button text-base">Completed</p>

			
			<p class="button text-base">Incomplete</p>
			

			<a class="button text-base" href="{{ url('create_service') }}/{{ $truck->id }}">Add new service</a>
		</div>
			
		@if (isset($services))

		<table id="service-table" class="text-2xl m-auto mt-10 w-4/5 text-center table-auto">
			<tr>
				<th>Name:</th>
				<th>Due in:</th>
			</tr>
			@foreach ($services as $service)

				<!-- use service->status as classname for sorting purposes -->
				<tr class="{{ $service->status }}">
					<td>{{ $service->name }}</td>
					<td>{{ $service->mileage_due - $truck->mileage}} miles</td>
					<td><div class="button text-sm"><a href="/update_service/{{ $service->id }}">View/Edit</a></div></td>
				</tr>

			@endforeach

		</table>

		@endif

	</main>

</body>
</html>