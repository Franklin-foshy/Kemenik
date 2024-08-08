@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 text-center">

            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <div class="maintenance-img">
                        <img src="assets/images/logo-light.png" alt="" class="img-fluid mx-auto d-block">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card-body">
                        <h2 style="color: #0d3e66"><strong>Bienvenidos</strong></h2>
                        <a class="btn btn-primary waves-effect btn-label waves-light" href="{{ route('register') }}"><i class="bx bx-right-arrow-alt label-icon"></i>SIGUIENTE</a>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                
            </div>

        </div>
    </div>
</div>
@endsection