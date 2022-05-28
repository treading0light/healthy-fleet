<header class="flex justify-between items-center min-h-content min-w-screen bg-slate-300">

	<div id="logo" class="h-max max-w-full">
		<img 
		src="{{ asset('images/healthy-fleet-logo.png') }}"
		class="max-h-24 p-2"
		>

	</div>

	

	

	<div id="user_menu" class="flex-col mr-4">
		<h1 id="user">Hello {{ Auth::user()->name }}</h1>
		<ul id="menu_content" class="flex-col off">
			<li><form id="logout-form" action="{{ route('logout') }}" method="POST">

			@csrf
			<button class="" type="submit">Logout</button>

			</form></li>
		</ul>
		

	</div>

	<script>
		$('#user').on('click', function() {
			$(this).siblings('ul').toggleClass('off')
		})

		$('#logout').on('click', function(e) {
			$(this).parent('#logout-form').submit()
		})
	</script>
</header>
