<div class="container-fluid">
    <div class="row">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="text-center mb-5">
                    <h3>CORRESPONSABILIDAD DOMESTICA</h3>
                </div>
            </div>
        </div>
        @forelse($niveles as $nivel)
        <div class="col-xl-4">
            <div class="card">
                <a href="{{ route('nivel.preguntas', $nivel->id) }}">
                    <img class="card-img-top" src="{{ asset('niveles/' . $nivel->imagen) }}" alt="Nivel Image">
                </a>
                <div class="card-body">
                    <h5 class="card-title">{{ $nivel->name }}</h5>
                    <p class="card-text">{{ $nivel->descripcion }}</p>
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
</div>