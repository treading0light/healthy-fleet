<!DOCTYPE html>
<html>
<head>

	@include('layouts.head')
	
	<title> {{ $truck->name }} </title>

</head>

<body>

	<main id="truck-main">

		@include('layouts.header')
		@include('layouts.nav')

		@include('layouts.truck_block')

		<hr>

		<div id="service-bar" class="flex-row w-12 h-12">
			<h2 id="doodle">Services:</h2>


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

		<table id="service-table">
			<tr>
				<th>Name:</th>
				<th>Due in:</th>
			</tr>
			@foreach ($services as $service)

				@if ($service->status = 'open')
				<tr class="open">
					<td>{{ $service->name }}</td>
					<td>{{ $service->mileage_due - $truck->mileage}} miles</td>
					<td><div class="button">View/Edit</div></td>
				</tr>

				@else
				<tr class="closed">
					<td>{{ $service->name }}</td>
					<td>{{ $service->mileage_due - $truck->mileage}} miles</td>
				</tr>
				@endif
			@endforeach

		</table>

		@endif

	</main>

</body>
</html>