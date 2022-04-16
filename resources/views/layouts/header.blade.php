<header id="header_flex">
	<div id="logo">
		<img src="{{ asset('images/healthy-fleet-logo.png') }}">
	</div>

	<div id="user_menu" class="flex-col">
		<h1 id="user">Hello {{ Auth::user()->name }}</h1>
		<ul id="menu_content" class="flex-col off">
			<li><form id="logout-form" action="{{ route('logout') }}" method="POST">

			@csrf
			<button class="button" type="submit">Logout</button>

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
