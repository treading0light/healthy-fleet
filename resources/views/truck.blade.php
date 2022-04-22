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

		<div id="service-bar" class="flex-row">
			<h2 id="doodle">Services:</h2>


			<div class="button">
				<p>Completed</p>
			</div>

			<div class="button">
				<p>Incomplete</p>
			</div>

			<div class="button">
				<a href="services/{{ $truck->id }}">Add new service</a>
			</div>
		</div>
			
		<div id="service-tray">
			<div class="flex-row service-card">
				<p>Name:</p>
				<p>Due in:</p>
				
			</div>
		@if ($truck->services)
			@foreach ($truck->services as $service)

				@if ($service->status = 'open')
				<div class="service-card flex-row open">
					<h3>{{ $service->name }}</h3> 
					<h3>{{ $service->mileage_due - $truck->mileage}} miles</h3>
					<div class="button">
						<a href="#">View/Edit</a>
					</div>
				</div>
				@else
				<div class="service-card flex-row closed">

				</div>
				@endif

			
				

			
			@endforeach
		@endif
		</div>

	</main>

</body>
</html>