<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Full Costing & Sell Price</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="{{ asset('back/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
	<link rel="stylesheet" href="{{ asset('back/bower_components/font-awesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('back/dist/css/AdminLTE.min.css') }}">
	<link rel="stylesheet" href="{{ asset('back/dist/css/skins/_all-skins.min.css') }}">
	<link rel="stylesheet" href="{{ asset('back/plugins/datatables/dataTables.bootstrap.min.css') }}">

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
	  	<header class="main-header">
			<a href="index2.html" class="logo">
				<span class="logo-mini"><b></b>FC</span>
				<span class="logo-lg"><b>Full</b> Costing</span>
			</a>
			<nav class="navbar navbar-static-top">
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="{{ asset('back/dist/img/user.png') }}" class="user-image" alt="User Image">
								<span class="hidden-xs">{{ ucfirst(Auth::user()->name) }}</span>
							</a>
							<ul class="dropdown-menu">
								<li class="user-header">
									<img src="{{ asset('back/dist/img/user.png') }}" class="img-circle" alt="User Image">
									<p> {{ ucfirst(Auth::user()->name) }} </p>
								</li>
								<!-- Menu Footer-->
								<li class="user-footer">
{{-- 									<div class="pull-left">
										<a href="#" class="btn btn-default btn-flat">Pengaturan</a>
									</div> --}}
									<div class="pull-right">
										<a href="{{ route('logout') }}" class="btn btn-default btn-flat" 
										onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											{{ csrf_field() }}
										</form>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
	  	</header>
		<aside class="main-sidebar">
			<section class="sidebar">
			<!-- Sidebar user panel -->
				<div class="user-panel">
					<div class="pull-left image">
						<img src="{{ asset('back/dist/img/user.png') }}" class="img-circle" alt="User Image">
					</div>
					<div class="pull-left info">
						<p>{{ ucfirst(Auth::user()->name) }}</p>
						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>
				<ul class="sidebar-menu" data-widget="tree">
				@include('back.partials.menu')
				</ul>
			</section>
		</aside>

		<!-- content -->
	  	<div class="content-wrapper">
		    @yield('content')
	  	</div>
		<!-- content -->


	  	<footer class="main-footer">
			@include('back.partials.footer')
	  	</footer>
	</div>
</body>
<script src="{{ asset('back/bower_components/jquery/dist/jquery.min.js') }}"></script>
{{-- <script src="{{ asset('back/bower_components/jquery-ui/jquery-ui.min.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="{{ asset('back/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('back/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('back/plugins/datatables/datatables.min.js') }}"></script>
@yield('script')
</html>
