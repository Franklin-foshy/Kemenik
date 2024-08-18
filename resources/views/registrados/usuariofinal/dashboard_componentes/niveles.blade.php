
<div class="row">
  @forelse($niveles as $nivel)
        <div class="col-lg-4 mt-4 mb-3" id="cards-para-imagenes">
          <div class="card z-index-2">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
                <div class="chart">
                  <a id="nivel{{ $nivel['id'] }}" href="{{ route('nivel'.$nivel['id'])}}">
                    <img class="imagen-nivel" src="{{ asset('niveles/' . $nivel->imagen) }}" alt="">
                  </a>
                </div>  
            </div>
            <div class="card-body">
              <h6 class="mb-0">{{ $nivel['name'] }}</h6>
              <p class="text-sm">{{_('Test corresponsabilidad')}}</p>
              <hr class="dark horizontal">
              <div class="d-flex">
                <i class="material-icons text-sm my-auto me-1">{{_('schedule')}}</i>
                <p class="mb-0 text-sm">{{ $nivel['descripcion'] }}</p>
              </div>
            </div>
          </div>
        </div>
  @empty
      <div class="col-12">
          <div class="alert alert-primary text-center">
              No hay niveles disponibles.
          </div>
      </div>
  @endforelse
</div>
