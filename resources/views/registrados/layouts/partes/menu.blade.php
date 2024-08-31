<div class="topnav" id="head">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">
                    <a class="nav-link dropdown-toggle arrow-none" href="{{ url('home') }}" id="topnav-dashboard" role="button">
                        <i class="bx bx-home me-2"></i><span key="t-dashboards">INICIO</span>
                    </a>
                    @if(kvfj(Auth::user()->rol->permissions, 'get_roles'))
                    <a class="nav-link dropdown-toggle arrow-none" href="{{ route('roles') }}" id="topnav-dashboard" role="button">
                        <i class="bx bx-cog me-2"></i><span key="t-dashboards">ROLES</span>
                    </a>
                    @endif
                    @if(kvfj(Auth::user()->rol->permissions, 'get_users'))
                    <a class="nav-link dropdown-toggle arrow-none" href="{{ route('users') }}" id="topnav-dashboard" role="button">
                        <i class="bx bx-user-circle me-2"></i><span key="t-dashboards">USUARIOS</span>
                    </a>
                    @endif
                    @if(kvfj(Auth::user()->rol->permissions, 'get_niveles'))
                    <a class="nav-link dropdown-toggle arrow-none" href="{{ route('nivels') }}" id="topnav-dashboard" role="button">
                        <i class="bx bx-stats me-2"></i><span key="t-dashboards">NIVELES</span>
                    </a>
                    @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button">
                            <i class="bx bx-circle me-2"></i><span key="t-dashboards">DESPLEGABLE 1</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                            @if(kvfj(Auth::user()->rol->permissions, 'get_rompecabezas'))
                            <a href="{{ route('misrompecabezas') }}" class="dropdown-item" key="t-default">ROMPECABEZAS</a>
                            @endif
                            @if(kvfj(Auth::user()->rol->permissions, 'get_preguntas'))
                            <a href="{{ route('mispreguntas') }}" class="dropdown-item" key="t-default">PREGUNTAS</a>
                            @endif
                            @if(kvfj(Auth::user()->rol->permissions, 'get_respuestas'))
                            <a href="{{ route('misrespuestas') }}" class="dropdown-item" key="t-default">RESPUESTAS</a>
                            @endif
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button">
                            <i class="bx bx-circle me-2"></i><span key="t-dashboards">DESPLEGABLE 2</span>
                            <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                            @if(kvfj(Auth::user()->rol->permissions, 'get_escenas'))
                            <a href="{{ route('escenas') }}" class="dropdown-item" key="t-default">ESCENAS</a>
                            @endif
                            @if(kvfj(Auth::user()->rol->permissions, 'get_ppreguntas'))
                            <a href="{{ route('ppreguntas') }}" class="dropdown-item" key="t-default">PERSONAJE PREGUNTAS</a>
                            @endif
                            @if(kvfj(Auth::user()->rol->permissions, 'get_prespuestas'))
                            <a href="{{ route('prespuestas') }}" class="dropdown-item" key="t-default">PERSONAJE RESPUESTAS</a>
                            @endif
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="#" id="topnav-dashboard" role="button">
                            <i class="bx bx-line-chart me-2"></i><span key="t-dashboards">PROGRESO</span>
                            <div class="arrow-down"></div>
                        </a>
                        @if(kvfj(Auth::user()->rol->permissions, 'get_progresoUsuario'))
                        <div class="dropdown-menu" aria-labelledby="topnav-dashboard">
                            <a href="{{ route('progresousuariouno') }}" class="dropdown-item" key="t-default">PROGRESO NIVEL UNO</a>
                        </div>
                        @endif
                    </li>
                </ul>
            </div>

        </nav>
    </div>
</div>