@extends('registrados.layouts.master')

@section('content')
<div class="container-fluid">
    @php
    $img_src = 'https://ui-avatars.com/api/?name=' . Auth::user()->name;
    @endphp
    <!-- start page title -->

    <!-- end page title -->

    <!-- start row dashboard admin-->
    @if(kvfj(Auth::user()->rol->permissions, 'admin'))
    <div class="row">
        <div class="col-xl-4">
            <div class="card overflow-hidden">
                <div style="background-color:#0d3e66; color:aliceblue;">
                    <div class="row">
                        <div class="col-12">
                            <div class="p-4">
                                <p>Hola, <br> Bievenido(a) al Sistema Administativo</p>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                $img_src = 'https://ui-avatars.com/api/?name=' . Auth::user()->name;
                @endphp
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="avatar-md profile-user-wid mb-4">
                                <img class="img-thumbnail rounded-circle" src="{{ $img_src }}" alt="Header Avatar">
                            </div>
                            <h5 class="font-size-15 text-truncate">{{ \Auth::user()->name }}</h5>
                            <p class="text-muted mb-0 text-truncate">{{ \Auth::user()->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="row">
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title rounded-circle bg-primary-subtle font-size-18">
                                        <i class="bx bxs-bolt-circle"></i>
                                    </span>
                                </div>
                                <h5 class="font-size-14 mb-0">Nivel 1</h5>
                            </div>
                            <div class="text-muted mt-4">
                                <h4>{{ $nivelUnoFin }}<i class="mdi mdi-chevron-up ms-1 text-success"></i></h4>
                                <div class="d-flex">
                                    <span class="badge badge-soft-success font-size-12">100%</span> <span class="ms-2 text-truncate">Terminado</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title rounded-circle bg-primary-subtle font-size-18">
                                        <i class="bx bxs-bolt-circle"></i>
                                    </span>
                                </div>
                                <h5 class="font-size-14 mb-0">Nivel 2</h5>
                            </div>
                            <div class="text-muted mt-4">
                                <h4>{{ $nivelDosFin }}<i class="mdi mdi-chevron-up ms-1 text-success"></i></h4>
                                <div class="d-flex">
                                    <span class="badge badge-soft-success font-size-12">100%</span> <span class="ms-2 text-truncate">Terminado</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title rounded-circle bg-primary-subtle font-size-18">
                                        <i class="bx bxs-bolt-circle"></i>
                                    </span>
                                </div>
                                <h5 class="font-size-14 mb-0">Nivel 3</h5>
                            </div>
                            <div class="text-muted mt-4">
                                <h4>{{ $nivelTresFin }}<i class="mdi mdi-chevron-up ms-1 text-success"></i></h4>

                                <div class="d-flex">
                                    <span class="badge badge-soft-success font-size-12">100%</span> <span class="ms-2 text-truncate">Terminado</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Usuarios registrados por departamento</h4>

                    <div class="text-center">
                        <div class="mb-4">
                            <i class="bx bx-map display-4"></i>
                        </div>
                        <h3>{{ $totalUsuarios }}</h3>
                        <p>Usuarios registrados en Kemenik</p>
                    </div>

                    <div class="table-responsive mt-4">
                        <table class="table align-middle table-nowrap">
                            <tbody>
                                @foreach($usuariosPorDepartamento as $registro)
                                <tr>
                                    <td style="width: 30%">
                                        <p class="mb-0">{{ $registro->departamento->name }}</p>
                                    </td>
                                    <td style="width: 25%">
                                        <h5 class="mb-0">{{ $registro->total }}</h5>
                                    </td>
                                    <td>
                                        <div class="progress bg-transparent progress-sm">
                                            <div class="progress-bar bg-primary rounded" role="progressbar" style="width: {{ $registro->total / $totalUsuarios * 100 }}%" aria-valuenow="{{ $registro->total }}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Ingreso general a niveles</h4>

                    <div>
                        <div id="donut-chart" data-colors='["--bs-primary", "--bs-success", "--bs-danger"]' class="apex-charts"></div>
                    </div>

                    <div class="text-center text-muted">
                        <div class="row">
                            <div class="col-4">
                                <div class="mt-4">
                                    <p class="mb-2 text-truncate"><i class="mdi mdi-circle text-primary me-1"></i> Nivel 1</p>
                                    <h5>{{ $nivelUnoGen }}</h5>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-4">
                                    <p class="mb-2 text-truncate"><i class="mdi mdi-circle text-success me-1"></i> Nivel 2</p>
                                    <h5>{{ $nivelDosGen }}</h5>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-4">
                                    <p class="mb-2 text-truncate"><i class="mdi mdi-circle text-danger me-1"></i> Nivel 3</p>
                                    <h5>{{ $nivelTresGen }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- apexcharts -->
            <script src="assets/libs/apexcharts/apexcharts.min.js"></script>
            <!-- Saas dashboard init -->
            <script src="assets/js/pages/saas-dashboard.init.js"></script>
        </div>
    </div>
    <!-- end row -->
    @endif

    <!--  ####### ACA SE RETORNA TODO LO RELACIONADO AL USUARIO FINAL ####### -->

    <!-- Valida que tenga el permiso 'usuariofinal' -->
    @if(kvfj(Auth::user()->rol->permissions, 'usuariofinal'))
    @include('registrados.usuariofinal.niveles');
    @endif
    <!-- Fin validación de permisos 'usuariofinal' -->


</div> <!-- container-fluid -->

@endsection