<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ route('machine.index', [ 'machine' => $machine->slug ]) }}">
    <img src="{{ asset('img/logo.png') }}" onerror="this.onerror=null;this.src='img/404-logo.png';" 
         width="auto" height="80" alt="logo" loading="lazy">
    Expens
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('machine.index', [ 'machine' => $machine->slug ]) }}"><strong>Tienda</strong></a>
      </li>
      @guest
          <li class="nav-item">
            <a class="nav-link" href="#"><strong>Registrar</strong></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><strong>Acceder</strong></a>
          </li>
      @else
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <strong>Cuenta</strong>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Perfil</a>
            <a class="dropdown-item" href="#">Compras</a> 
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                Salir
            </a>
            </div>
          </li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
          </form>
      @endguest
      </ul>
  </div>
</nav>
