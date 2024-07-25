<div class="topnav">
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
                        <i class="bx bxs-user-detail me-2"></i><span key="t-dashboards">USUARIOS</span>
                    </a>
                    @endif
                    @if(kvfj(Auth::user()->rol->permissions, 'get_niveles'))
                    <a class="nav-link dropdown-toggle arrow-none" href="{{ route('niveles') }}" id="topnav-dashboard" role="button">
                        <i class="bx bx-stats me-2"></i><span key="t-dashboards">NIVELES</span>
                    </a>
                    @endif
                    @if(kvfj(Auth::user()->rol->permissions, 'get_preguntas'))
                    <a class="nav-link dropdown-toggle arrow-none" href="{{ route('mispreguntas') }}" id="topnav-dashboard" role="button">
                        <i class="bx bx-question-mark me-2"></i><span key="t-dashboards">PREGUNTAS</span>
                    </a>
                    @endif
                    @if(kvfj(Auth::user()->rol->permissions, 'get_respuestas'))
                    <a class="nav-link dropdown-toggle arrow-none" href="{{ route('misrespuestas') }}" id="topnav-dashboard" role="button">
                        <i class="bx bx-check-circle me-2"></i><span key="t-dashboards">RESPUESTAS</span>
                    </a>
                    @endif
                </ul>
            </div>

        </nav>
    </div>
</div>