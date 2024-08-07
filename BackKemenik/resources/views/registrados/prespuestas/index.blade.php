@extends('registrados.layouts.master')
@section('title', 'Personaje respuestas')

@section('content')
<div class="main-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">

                <div class="row justify-content-between mb-3">
                    <div class="col-auto">
                        <h5 class="mt-2">PERSONA RESPUESTAS</h5>
                    </div>
                    <div class="col-auto">
                        @if(kvfj(Auth::user()->rol->permissions, 'post_prespuestas'))
                        <div class="col-auto">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#newPRespuesta">
                                <span data-bs-toggle="tooltip" data-bs-offset="0,1" data-bs-placement="top" data-bs-html="true" title="" data-bs-original-title="<span>Crear nueva persona respuesta</span>"><i class="fas fa-plus"></i></span>
                            </button>
                        </div>
                        @include('registrados.prespuestas.modals.add')
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
                                        <th>Nombre personaje</th>
                                        <th>Texto pregunta</th>
                                        <th>Texto respuesta</th>
                                        <th>Estado</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prespuestas as $prespuesta)
                                    @include('registrados.prespuestas.modals.edit')
                                    <tr class="align-middle">
                                        <td>{{ $prespuesta->id }}</td>
                                        <td class="text-nowrap">
                                            {{ $prespuesta->nombre }}
                                        </td>
                                        <td>{{ $prespuesta->ppregunta->texto_pregunta }}</td>
                                        <td class="text-nowrap">
                                            {{ $prespuesta->texto_respuesta }}
                                        </td>
                                        <td>
                                            @if ($prespuesta->status == 1)
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
                                                    @if(kvfj(Auth::user()->rol->permissions, 'edit_prespuestas'))
                                                    <li>
                                                        <button class="dropdown-item pointer btn-sm" data-bs-toggle="modal" data-bs-target="#editPRespuesta{{ $prespuesta->id }}">
                                                            <i class="fas fa-edit"></i>&nbsp; Editar
                                                        </button>
                                                    </li>
                                                    @endif
                                                    @if(kvfj(Auth::user()->rol->permissions, 'delete_prespuestas'))
                                                    <li>
                                                        <form action="{{ route('prespuesta-delete', $prespuesta->id) }}" method="post" autocomplete="off" id="delete_form_{{ $prespuesta->id }}">
                                                            @csrf
                                                            <button class="dropdown-item pointer btn-sm" type="button" onclick="confirmDelete({{ $prespuesta->id }}, {{ $prespuesta->status }} ,'el prespuesta')">
                                                                @switch($prespuesta->status)
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