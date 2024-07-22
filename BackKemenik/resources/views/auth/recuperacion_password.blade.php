<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .custom-bg {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body class="custom-bg">
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-6">

                    <div class="card">
                        <div class="card-body">
                            <div class="p-0">
                                <div class="text-center">
                                    <div class="p-2 mt-4">
                                        <h3>¡Hola!, {{ $user->name }}</h3>
                                        <h6 class="opacity-75">Este es un correo electrónico con su nueva contraseña<br>
                                            <strong>
                                                <h2>{{ $password }}</h2>
                                            </strong>
                                        </h6><br>
                                        <a href="{{ route('login') }}" class="btn btn-outline-dark btn-sm">Iniciar Sesión</a><br><br>
                                        <p>Si el botón anterior no le funciona, haga clic en el siguiente enlace:</p>
                                        <a href="{{ route('login') }}">{{ route('login') }}</a>
                                    </div>
                                    <div class="p-2 mt-2">
                                        <h6>
                                            <p>KEMENIK<br>
                                                KEMENIK © 2024</p>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>