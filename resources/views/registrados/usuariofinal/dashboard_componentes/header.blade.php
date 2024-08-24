<!---------------------------- Header -------------------------------->

<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
            <div class="content-img-header">
              <img id = "header"src="{{ asset('imgs/nivel2/header_principal.jpeg') }}" alt="" class = "header" style="display: block">
            </div>
            <ul class="navbar-nav  justify-content-end" id="menu-header">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <!---------------------------- Sing out ------------------------------>
            <div class = "sing-in-cont" >
            <li class="nav-item d-flex align-items-center" id="sign-in" >
              <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                  @csrf
                  <a href="{{ route('logout') }}" class="nav-link text-body font-weight-bold px-0" onclick="event.preventDefault(); this.closest('form').submit();">
                      <i class="fa fa-user me-sm-1"></i>
                      <span class="d-sm-inline d-none">{{_('Sign Out')}}</span>
                  </a>
              </form>
          </li>
              </div>
    </nav>
