<!doctype html>
<html lang="es">

<!-- encabezado -->
<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>KEMENIK</title>
    <link id="pagestyle" href="{{ asset('assets/css/styles_back.css') }}" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('assets.css.styles')
    

</head>
<!-- end encabezado -->

<body data-layout="horizontal">

    <!-- Page -->
    <div id="layout-wrapper">
        <header>
            @include('registrados.layouts.partes.header')
            @include('registrados.layouts.partes.menu')
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
    <!-- TOAST -->
    @include('registrados.layouts.components.toast')
</body>

<style>

</style>