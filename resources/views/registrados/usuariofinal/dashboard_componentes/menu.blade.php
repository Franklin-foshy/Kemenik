<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-custom" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0"  target="_blank">
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
          <img class="img-thumbnail rounded-circle small-avatar" src="{{ $img_src }}" alt="Header Avatar">
          <span class="nav-link-text ms-1">{{ \Auth::user()->name }}</span>
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
        <script type="text/javascript">
      // Este script se ejecutará cuando el usuario haga clic en el botón de cerrar sesión
      document.querySelector('.logout-btn').addEventListener('click', function() {
        localStorage.removeItem('modalShown');
      });
    </script>
            <!--<span class="nav-link-text ms-1">Salir</span>-->
          </a>
      </ul>
    </div>
  </aside>
  <style>
            .small-avatar {
            margin-right: 10px !important; /* Espacio entre el avatar y el nombre */
            width: 30px; /* Ajusta el tamaño del avatar */
            height: 30px; /* Asegura que sea un círculo perfecto */
        }
        .img-thumbnail {
        
        position: relative !important;
        padding: 0.25rem;
        margin-right: 15% !important;
        background-color: #fff;
        border: 1px solid #db6b42 !important;
        border-radius: 0.375rem;
        max-width: 100%;
        height: auto;
        left: 12%;
        }
  </style>
