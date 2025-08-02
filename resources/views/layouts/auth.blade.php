<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>{{ucfirst(AppSettings::get('app_name', 'App'))}} - {{ucfirst($title ?? 'Auth')}}</title>
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Favicon -->
	<link rel="icon" type="image/png" href="{{ asset('assets/img/favicon1.png') }}">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">

	<!-- Main CSS -->
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

	@yield('page-css')
</head>

<body>
	<!-- Main Wrapper -->
	<div class="main-wrapper login-body">
		<div class="login-wrapper">
			<div class="container">
				<div class="loginbox">
					<div class="login-left">
						<img style="margin-bottom: 12%;" class="img-fluid" src="{{ asset('assets/img/Logo.png') }}"
							alt="Logo">
					</div>


					<div class="login-right">
						<div class="login-right-wrap">
							@if ($errors->any())
								@foreach ($errors->all() as $error)
									<x-alerts.danger :error="$error" />
								@endforeach
							@endif
							@yield('content')
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Main Wrapper -->

	<!-- jQuery -->
	<script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>

	<!-- Bootstrap Core JS -->
	<script src="{{ asset('assets/js/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

	<!-- Custom JS -->
	<script src="{{ asset('assets/js/script.js') }}"></script>
	<script src="{{ asset('js/app.js') }}"></script>

	@yield('page-js')
</body>

</html>