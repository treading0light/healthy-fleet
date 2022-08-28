<header class="flex justify-between items-center min-h-content min-w-screen bg-slate-300">

	<div id="logo" class="h-max max-w-full">
		<img 
		src="{{ asset('images/healthy-fleet-logo.png') }}"
		class="max-h-24 p-2"
		>

	</div>

	<div id="company_name" class="text-2xl">
		<h2>{{ ucfirst(Auth::user()->company->name) }}</h2>
		
	</div>

	

	

	<div id="user_menu" class="flex-col mr-4 md:text-2xl">

		<h1 id="user" class="w-full hover:cursor-pointer">Hello <span class="font-bold">{{ ucfirst(Auth::user()->name) }}</span></h1>

		<ul id="menu_content" class="p-3 w-full rounded-2xl bg-slate-50 absolute off">
			<li><form id="logout-form" action="{{ route('logout') }}" method="POST">

			@csrf
			<button class="" type="submit">Logout</button>

			</form></li>
		</ul>
		

	</div>

	<script>
		$('#user').on('click', function() {
			$(this).siblings('ul').toggleClass('off bg-slate-400')
			// $(this).parent('#user_menu').toggleClass('bg-slate-400')
		})

		$('#logout').on('click', function(e) {
			$(this).parent('#logout-form').submit()
		})
	</script>
</header>
