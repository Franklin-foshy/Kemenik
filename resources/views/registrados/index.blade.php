@extends('registrados.layouts.master')

@section('content')
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">INICIO</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Bienvenidos</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
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
    </div>
    @endif
    <!-- end row -->


    <!-- start row userFinal-->
    @if(kvfj(Auth::user()->rol->permissions, 'usuariofinal'))
    @include('registrados.usuariofinal.niveles');
    @endif
    <!-- end row -->

</div> <!-- container-fluid -->

@endsection