<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
		<link href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet">
		<style>
			table form { margin-bottom: 0; }
			form ul { margin-left: 0; list-style: none; }
			.error { color: red; font-style: italic; }
			body { padding-top: 20px; }
		</style>
		@yield('styles')
	</head>

	<body>
<p>{{{ Request::path() }}}</p>
		<div class="container">
		<ul class="nav nav-pills">
			@if(!Auth::check())
				<!-- user is not logged in -->
				@if(Request::path() === '/')
					<li class="active">{{ link_to_route('home', 'Главная') }}</li>
				@else
					<li>{{ link_to_route('home', 'Главная') }}</li>
				@endif

				@if(Request::path() === 'about_us')
					<li class="active">{{link_to_route('about_us', 'О нас') }}</li>
				@else
					<li>{{link_to_route('about_us', 'О нас') }}</li>
				@endif

				@if(Request::path() != 'login')
					<li class="pull-right">{{ link_to_route('login.index', 'Login') }}</li>
				@endif
			@else
				<!-- user is logged in -->
				@if(Request::path() === '/')
					<li class="active">{{ link_to_route('home', 'Главная') }}</li>
				@else
					<li>{{ link_to_route('home', 'Главная') }}</li>
				@endif


				@if(Request::path() === 'about_us')
					<li class="active">{{link_to_route('about_us', 'О нас') }}</li>
				@else
					<li>{{link_to_route('about_us', 'О нас') }}</li>
				@endif

				@if(Auth::user()->isAdmin())
					<!-- user is admin -->
					@if(Request::path() === 'dashboard')
						<li class="active">{{ link_to_route('login.dashboard', 'Админка')}}</li>
					@else
						<li>{{ link_to_route('login.dashboard', 'Админка')}}</li>
					@endif

					@if(Request::path() === 'roles')
						<li class="active">{{ link_to_route('roles.index', 'Roles') }}</li>
					@else
						<li>{{ link_to_route('roles.index', 'Roles') }}</li>
					@endif

					@if(Request::path() === 'catalogs')
						<li class="active">{{ link_to_route('catalogs.index', 'Catalogs') }}</li>
					@else
						<li>{{ link_to_route('catalogs.index', 'Catalogs') }}</li>
					@endif

					@if(Request::path() === 'users')
						<li class="active">{{ link_to_route('users.index', 'Users') }}</li>
					@else
						<li>{{ link_to_route('users.index', 'Users') }}</li>
					@endif

				@endif
				<li class="pull-right">{{ link_to_route('login.logout', 'Logout') }}</li>
			@endif
		</ul>
			@if (Session::has('message'))
				<div class="flash alert">
					<p>{{ Session::get('message') }}</p>
				</div>
			@endif

			@yield('main')
		</div>
	<script type="text/javascript" src="//code.jquery.com/jquery.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/ui/1.10.3/jquery-ui.min.js"></script>
	@yield('scripts')
	</body>

</html>