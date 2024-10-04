@extends('registrados.layouts.master')
@section('title', 'Progreso Usuarios')

@section('content')
<div class="main-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">

                <div class="row justify-content-between mb-3">
                    <div class="col-auto">
                        <h5 class="mt-2">PROGRESO USUARIOS NIVEL TRES</h5>
                    </div>
                </div>

            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr class="text-nowrap">
                                        <th>No.</th>
                                        <th>Nombre usuario</th>
                                        <th>Nivel</th>
                                        <th>Pregunta</th>
                                        <th>Respuesta</th>
                                        <th>Correcto / Incorrecto</th>
                                        <th>Puntuación</th>
                                        <th>Intentos</th>
                                        <th>¿Completado?</th>
                                        <th>Creado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($progresoTresUsuarios as $progresoTresUsuario)
                                    <tr class="align-middle">
                                        <td>{{ $progresoTresUsuario->id }}</td>
                                        <td>{{ $progresoTresUsuario->usuario->name }}</td>
                                        <td>{{ $progresoTresUsuario->nivel_id_pregunta }}</td>
                                        <td>{{ $progresoTresUsuario->pregunta->texto_pregunta }}</td>
                                        <td>{{ $progresoTresUsuario->texto_respuesta_respuestas }}</td>
                                        <td>
                                            @if ($progresoTresUsuario->status_final_respuesta == 1)
                                            <span class="badge bg-success">Correcto</span>
                                            @else
                                            <span class="badge bg-danger">Incorrecto</span>
                                            @endif
                                        </td>
                                        <td>{{ $progresoTresUsuario->puntuacion }}</td>
                                        <td>{{ $progresoTresUsuario->intentos }}</td>
                                        <td>
                                            @if ($progresoTresUsuario->completado == 1)
                                            <span class="badge bg-success">SI</span>
                                            @else
                                            <span class="badge bg-danger">NO</span>
                                            @endif
                                        </td>
                                        <td>{{ $progresoTresUsuario->created_at }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div> <!-- end card body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>
@endsection