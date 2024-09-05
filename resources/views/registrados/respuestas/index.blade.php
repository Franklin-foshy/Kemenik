@extends('registrados.layouts.master')
@section('title', 'Respuestas')

@section('content')
<div class="main-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">

                <div class="row justify-content-between mb-3">
                    <div class="col-auto">
                        <h5 class="mt-2">RESPUESTAS</h5>
                    </div>
                    <div class="col-auto">
                        @if(kvfj(Auth::user()->rol->permissions, 'post_respuestas'))
                        <div class="col-auto">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#newRespuesta">
                                <span data-bs-toggle="tooltip" data-bs-offset="0,1" data-bs-placement="top" data-bs-html="true" title="" data-bs-original-title="<span>Crear nueva respuesta</span>"><i class="fas fa-plus"></i></span>
                            </button>
                        </div>
                        @include('registrados.respuestas.modals.add')
                        @endif
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
                            <table class="table data-table table-striped">
                                <thead>
                                    <tr class="text-nowrap">
                                        <th>No.</th>
                                        <th>Respuesta</th>
                                        <th>Pregunta</th>
                                        <th>Nivel</th>
                                        <th>Estado</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($respuestas as $respuesta)
                                    @include('registrados.respuestas.modals.edit')
                                    <tr class="align-middle">
                                        <td>{{ $respuesta->id }}</td>
                                        <td class="text-nowrap">
                                            {{ $respuesta->texto_respuesta }}
                                        </td>
                                        <td class="text-nowrap">
                                            {{ $respuesta->pregunta->texto_pregunta }}
                                        </td>
                                        <td>{{ $respuesta->pregunta->nivel_id }}</td>
                                        <td>
                                            @if ($respuesta->status == 1)
                                            <span class="badge bg-success">Activo</span>
                                            @else
                                            <span class="badge bg-danger">Inactivo</span>
                                            @endif
                                        </td>
                                        <td class="text-center align-middle">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-icon btn-sm rounded-pill dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    @if(kvfj(Auth::user()->rol->permissions, 'edit_respuestas'))
                                                    <li>
                                                        <button class="dropdown-item pointer btn-sm" data-bs-toggle="modal" data-bs-target="#editRespuesta{{ $respuesta->id }}">
                                                            <i class="fas fa-edit"></i>&nbsp; Editar
                                                        </button>
                                                    </li>
                                                    @endif
                                                    @if(kvfj(Auth::user()->rol->permissions, 'delete_respuestas'))
                                                    <li>
                                                        <form action="{{ route('respuesta-delete', $respuesta->id) }}" method="post" autocomplete="off" id="delete_form_{{ $respuesta->id }}">
                                                            @csrf
                                                            <button class="dropdown-item pointer btn-sm" type="button" onclick="confirmDelete({{ $respuesta->id }}, {{ $respuesta->status }} ,'el respuesta')">
                                                                @switch($respuesta->status)
                                                                @case(0)
                                                                <i class="fas fa-check"></i>&nbsp; Habilitar
                                                                @break
                                                                @case(1)
                                                                <i class="fas fa-ban"></i>&nbsp; Inhabilitar
                                                                @break
                                                                @endswitch
                                                            </button>
                                                        </form>
                                                    </li>
                                                    @endif
                                                    @if(kvfj(Auth::user()->rol->permissions, 'delete_respuestas_total'))
                                                    <li>
                                                        <form action="{{ route('respuesta-delete-total', $respuesta->id) }}" method="post" autocomplete="off" id="delete_form_total{{ $respuesta->id }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="dropdown-item pointer btn-sm" type="button" onclick="confirmDeleteTotal({{ $respuesta->id }})">
                                                                <i class="fas fa-trash"></i>&nbsp; Eliminar
                                                            </button>
                                                        </form>
                                                    </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </td>
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