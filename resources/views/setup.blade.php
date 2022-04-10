<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Setup</title>
	<link rel="stylesheet" type="text/css" href="{{ secure_asset('css/setup.css') }}">

	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

</head>

<body class="flex-col">
	<main class="flex-col" id="main">
		@if($errors->any())
	    {!! implode('', $errors->all('<div>:message</div>')) !!}
		@endif

		<form id="setup" method="POST" action="{{ url('/setup') }}" enctype="multipart/form-data">
			@csrf
			
			<div id="intro" class="flex-col">

				<h1>Before we set up your fleet, <br> please answer the following questions</h1>
				<div class="button continue">Continue</div>

			</div>

			<div id="company" class="flex-col off">
				
				<h1>What is the name of your company?</h1>
				<p>Or you can just enter your first name</p>

				<input type="text" name="company_name" id="company_name">

				<div class="button continue">Continue</div>

			</div>

			<div id="choose-dep" class="flex-col off">
				<h1>Would you like to organize your fleet by department?</h1>

				
				<div id="question" class="flex-row">
					<div class="button yes">Yes</div>
					<div class="button no">No</div>
				</div>

				<div id="department" class="gridx2 off">

					@for ($i = 0; $i < 10; $i++)

					<h2>Department Name</h2>
					<input class="department-name" type="text" name="department_name[{{$i}}]">

					@endfor
					
				</div>
					
				<div class="button continue">Continue</div>

			</div>

			<div id="part-1-fin" class="flex-col off">
				<h1>That's it for part 1 of the setup. <br> Submit to continue</h1>

				<button type="submit" class="button submit">Submit</button>
				
			</div>
				
		</form>


	</main>

	<script src="{{ asset('js/setup.js') }}"></script>

	<script>
		console.log("{{ url('/setup/') }}")
	</script>

</body>
</html>