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


			<button onclick="show('.closed')" class="button text-base">Completed</button>

			
			<button onclick="show('.open')" class="button text-base">Incomplete</button>
			

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
			<tr class="service {{ $service->status }}">
				<td>{{ $service->name }}</td>
				<td>{{ $service->mileage_due - $truck->mileage}} miles</td>
				<td><a class="button text-sm" href="/update_service/{{ $service->id }}">View/Edit</a></td>
			</tr>

			@endforeach

		</table>

		@endif

	</main>

	<script>
		const show = (status) => {
			$('#service-table').children('.service').not(status).addClass('off')
			$('#service-table').children(status).removeClass('off')
			console.log('did it')
		}

		show('.open')
	</script>

</body>
</html>