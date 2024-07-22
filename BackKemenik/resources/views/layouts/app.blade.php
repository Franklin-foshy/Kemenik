<!doctype html>
<html lang="es">

<!-- encabezado -->

<head>
	<!-- utf-8 -->
	<meta charset="utf-8" />
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>KEMENIK</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- FondoTemplate -->
	<style>
		body {
			background-image: url('/assets/images/fondoinicial.png');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;
		}
	</style>
	<!-- CSS -->
	@include('assets.css.styles')
</head>
<!-- end encabezado -->

<body data-layout="horizontal">

	<!-- Page -->
	<div id="layout-wrapper">

		<header>
			<!-- aqui el header -->
		</header>

		<!-- main content -->
		<div class="main-content">
			<div class="page-content">
				@yield('content')
			</div>
		</div>
		<!-- end main content-->

		<footer>
			@include('layouts.partes.footer')
		</footer>

	</div>
	<!-- end Page -->

	<!-- JAVASCRIPT -->
	@include('assets.js.scripts')
</body>