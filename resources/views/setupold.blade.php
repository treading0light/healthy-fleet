<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Setup</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/setup.css') }}">

	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

</head>

<body class="flex-col">
	<main class="flex-col" id="main">
		<div id="opening">

			<div id="intro" class="flex-col">

				<h1>Before we set up your fleet, <br> please answer the following questions</h1>
				<div class="button continue">Continue</div>

			</div>

			<div id="company" class="flex-col off">
				
				<h1>What is the name of your company?</h1>
				<p>Or you can just enter your first name</p>

				<input type="text" name="company-name">

				<div class="button continue">Continue</div>

			</div>

			<div id="choose-dep" class="flex-col off">
				<h1>Would you like to organize your fleet by department?</h1>

				<form id="question" class="flex-col">
					<div>
						<h1>Yes</h1>
						<input id="yes" type="radio" name="dep-choice" value="yes">
					</div>

					<div>
						<input id="no" type="radio" name="dep-choice" value="no">
						<label for="no">no</label>

					</div>
				</form>

				<form id="department" class="flex-col off">
					<input class="department-name" type="text" name="department-name">

					<div class="button add-more">Add more</div>

				</form>	
					
				<div class="button continue">Continue</div>
				
			</div>

			<div id="choose-number" class="flex-col off">
				<h1>How many vehicles would you like to add right now?</h1>
				<h2>You can always add more later.</h2>
				<input type="number" name="number" id="number">
				<div class="button submit">Submit</div>

				<h1 class="message"></h1>

			</div>
		</div>


	</main>

	<script src="{{ asset('js/setup.js') }}"></script>

</body>
</html>