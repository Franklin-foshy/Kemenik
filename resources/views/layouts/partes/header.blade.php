<header id="page-topbar">
    <div class="navbar-header">


        <!-- LOGO -->
        <div class="navbar-brand-box">
            <a href="/" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="/assets/images/logo.png" alt="" height="22">
                </span>
                <span class="logo-lg">
                    <img src="/assets/images/logo-light.png" alt="" height="29">
                </span>
            </a>
        </div>

        <div>
            <a href="{{ route('login') }}" type="button" class="btn btn-outline-default waves-effect waves-light">Login</a>
            <a href="{{ route('register') }}" type="button" class="btn btn-success btn-sm waves-effect waves-light">Registrarse</a>
            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
            </div>
        </div>

    </div>
</header>