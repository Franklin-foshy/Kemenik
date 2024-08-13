<!doctype html>
<html lang="es">

<!-- encabezado -->
<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>KEMENIK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<!-- end encabezado -->

@yield('content')
