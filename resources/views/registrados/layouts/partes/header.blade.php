<header id="page-topbar">
    <div class="navbar-header">

        <!-- LOGO -->
        <div class="navbar-brand-box">
            <a href="/home" class="logo logo-dark">
                <span class="logo-sm">
                    <img id="header" src="{{ asset('imgs/nivel2/header_principal.jpeg') }}" alt="" class="header" style="width: 50%;">
                </span>
                <span class="logo-lg">
                    <img id="header" src="{{ asset('imgs/nivel2/header_principal.jpeg') }}" alt="" class="header" style="width: 50%;">
                </span>
            </a>
        </div>

        <div class="d-flex">
            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
            </div>
            @php
            $img_src = 'https://ui-avatars.com/api/?name=' . Auth::user()->name;
            @endphp
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{ $img_src }}" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ \Auth::user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Cerrar Sesión</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                </div>
            </div>
        </div>
    </div>
</header>