<div class="topnav">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">
                    <a class="nav-link dropdown-toggle arrow-none" href="{{ url('home') }}" id="topnav-dashboard" role="button">
                        <i class="fa fa-home me-2"></i><span key="t-dashboards">INICIO</span>
                    </a>
                    @if(kvfj(Auth::user()->rol->permissions, 'get_roles'))
                    <a class="nav-link dropdown-toggle arrow-none" href="{{ route('roles') }}" id="topnav-dashboard" role="button">
                        <i class="fa fa-cogs me-2"></i><span key="t-dashboards">ROLES</span>
                    </a>
                    @endif
                    @if(kvfj(Auth::user()->rol->permissions, 'get_users'))
                    <a class="nav-link dropdown-toggle arrow-none" href="{{ route('users') }}" id="topnav-dashboard" role="button">
                        <i class="fa fa-users me-2"></i><span key="t-dashboards">USUARIOS</span>
                    </a>
                    @endif
                </ul>
            </div>

        </nav>
    </div>
</div>