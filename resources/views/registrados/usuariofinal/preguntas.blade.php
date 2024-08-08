@extends('registrados.layouts.master')

@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">{{ $nivel->name }} - Preguntas</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li><a href="{{ url('home') }}">Niveles</a></li>
                        <li class="breadcrumb-item active">/Preguntas</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- start preguntas row -->
    <div class="row">
        @forelse($nivel->preguntas as $pregunta)
        <div class="col-xl-4">
            <div class="card">
                <a data-bs-toggle="modal" data-bs-target="#verRespuestas{{ $pregunta->id }}">
                    <img class="card-img-top img-reducida" src="{{ asset('preguntas/' . $pregunta->imagen) }}" alt="Pregunta Image">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $pregunta->texto_pregunta }}</h5>
                    </div>
                </a>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-primary text-center">
                No hay preguntas disponibles para este nivel.
            </div>
        </div>
        @endforelse
    </div>
    <!-- end preguntas row -->

    <!-- Modals -->
    @foreach($nivel->preguntas as $pregunta)
    @include('registrados.usuariofinal.modals.respuestas', ['pregunta' => $pregunta])
    @endforeach

</div> <!-- container-fluid -->

@endsection