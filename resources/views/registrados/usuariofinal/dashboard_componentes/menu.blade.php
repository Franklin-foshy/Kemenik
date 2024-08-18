<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-custom" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="{{ asset('imgs/index/logo_kemenik.avif')}}" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">{{_('JUNAMNOJ')}}</span>
      </a>
    </div>

    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-custom-menu" href="{{ route('misniveles') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">{{_('dashboard')}}</i>
            </div>
            <span class="nav-link-text ms-1">{{_('Aprende')}}</span>
          </a>
        </li> 
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">{{_('Datos Personales')}}</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="profile.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">{{_('Perfil')}}</span>
          </a>
        </li>
        <li class="nav-item">
          <form method="POST" action="{{ route('logout') }}" >
            @csrf
            <a class="nav-link text-white" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">{{_('login')}}</i>
                </div>
                <span class="nav-link-text ms-1">{{_('Salir')}}</span>
            </a>
        </form>
      
            <!--<span class="nav-link-text ms-1">Salir</span>-->
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white "href="{{ route('login') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">{{_('assignment')}}</i>
            </div>
            <span class="nav-link-text ms-1">{{_('Sign Up')}}</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
