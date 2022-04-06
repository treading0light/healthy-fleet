<header id="header_flex">
	<div id="logo">
		<img src="{{ asset('images/healthy-fleet-logo.png') }}">
	</div>

	<div id="user_menu" class="flex-col">
		<h1>Hello {{ Auth::user()->name }}</h1>
		<ul id="menu_content" class="flex-col off">
			<li><a id="logout">logout</a></li>
		</ul>
	</div>

	<script>
		$('#user_menu').on('click', function() {
			$(this).children('ul').toggleClass('off')
		})

		$('#logout').on('click' function() {
			// fetch("{{ url('/logout') }}")
			console.log('fart')
		})
	</script>
</header>
