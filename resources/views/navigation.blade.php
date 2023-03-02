<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="{{route('welcome')}}">{{env('APP_NAME')}}</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item @if(Route::is('welcome')) active @endif">
        <a class="nav-link" href="{{route('welcome')}}">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item @if(Route::is('tickets')) active @endif"">
        <a class="nav-link" href="{{route('tickets')}}">Tickets</a>
      </li>

      <li class="nav-item dropdown @if(Route::is('usuarios') || Route::is('catalogos')) active @endif"">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          Administración
        </a>
        <div class="dropdown-menu">
          @can('Seccion usuarios')
          <a class="dropdown-item" href="{{route('usuarios')}}">Usuarios</a>
          @endcan

          @can('Catalogos')
          <a class="dropdown-item" href="{{route('catalogos')}}">Catálogos</a>
          @endcan
        </div>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto mr-4">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          {{auth()->user()->name.' '.auth()->user()->lastname}}
        </a>
        <div class="dropdown-menu">
          <form class="form-inline" action="{{route('logout')}}" method="POST" onclick="return confirm('¿Estas seguro de salir del sistema?')">
            @csrf
            <button class="btn btn-link text-dark">Salir</button>
          </form>
        </div>
      </li>
    </ul>


  </div>
</nav>



<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand text-white" href="#">ASR</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a href="{{route('welcome')}}" class="nav-link text-white">Inicio</a>
        </li>
        <li class="nav-item">
            @if (Route::has('tickets'))
                <a href="{{route('tickets')}}" class="nav-link text-white">Tickets</a>
            @endif
        </li>
        {{-- <li class="nav-item">
            <form action="{{route('logout')}}" method="POST" onclick="return confirm('¿Estas seguro de salir del sistema?')">
                @csrf
                <button class="btn nav-link text-white">Salir</button>
            </form>  
        </li> --}}
      </ul>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
          {{auth()->user()->name}}
        </a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">
          <form action="{{route('logout')}}" method="POST" onclick="return confirm('¿Estas seguro de salir del sistema?')">
              @csrf
              <button class="btn nav-link text-white dropdown-item">Salir</button>
            </form> 
          
        </div>
      </li>
      </ul>
    </div>
  </nav> -->