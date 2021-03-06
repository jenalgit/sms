<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SMS</title>

	<link href="{{asset('css/app.css')}}" rel="stylesheet">
	<link href="{{asset('css/sweet-alert.css')}}" rel="stylesheet">

	<!-- Fonts -->
	{{-- <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'> --}}

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{url('/')}}">SMSCenter</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

				@if(Auth::check())
					<ul class="nav navbar-nav">
						<li @if(Request::is('inbox*')) class="active" @endif><a href="{{url('inbox')}}">SMS</a></li>
						<li class="dropdown @if(Request::is('contact*')||Request::is('group*')) active @endif">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">KONTAK <span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li @if(Request::is('contact*')) class="active" @endif><a href="{{url('contact')}}">LIST KONTAK</a></li>
									<li @if(Request::is('group*')) class="active" @endif><a href="{{url('group')}}">GROUP KONTAK</a></li>
								</ul>
						</li>
						<li @if(Request::is('keyword*')) class="active" @endif><a href="{{url('keyword')}}">KATA KUNCI</a></li>
						<li @if(Request::is('api*')) class="active" @endif><a href="{{url('api')}}">API</a></li>
						{{-- <li @if(Request::is('ews*')) class="active" @endif><a href="{{url('ews')}}">EWS</a></li> --}}
						<li @if(Request::is('twitters*')) class="active" @endif><a href="{{url('twitters')}}">TWITTER</a></li>

						@if(Auth::user()->group==1)
							<li class="dropdown @if(Request::is('modem*')) active @endif">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">PENGATURAN <span class="caret"></span></a>
									<ul class="dropdown-menu" role="menu">
										<li @if(Request::is('modem*')) class="active" @endif><a href="{{url('modem')}}">INFO MODEM</a></li>
										<li @if(Request::is('user*')) class="active" @endif><a href="{{url('user')}}">USER</a></li>
									</ul>
							</li>
						@endif

					</ul>
				@endif

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{url('auth/login')}}">MASUK</a></li>
						<li><a href="{{url('auth/register')}}">DAFTAR</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} @if(Session::has('access_token')) {{'+ @'.Session::get('access_token')['screen_name']}} @endif <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{url('profile')}}">Edit Profil</a></li>
								@if(Session::has('access_token'))
									<li><a href="{{url('twitter/logout')}}">Putuskan twitter</a></li>
								@else
									<li><a href="{{url('twitter/connect')}}">Hubungkan twitter</a></li>
								@endif
								<li><a href="{{url('auth/logout')}}">Keluar</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
	<script src="{{asset('js/jquery.min.js?v2.1.3')}}"></script>
	<script src="http://code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
	<script src="{{asset('js/bootstrap.min.js?v3.3.1')}}"></script>

	@yield('content')
	<script type="text/javascript">
		$("[data-toggle=popover]").popover({
			placement:'bottom'
		});
	</script>
	<!-- Scripts -->
	<script src="{{asset('js/sweet-alert.min.js')}}"></script>

</body>
</html>
