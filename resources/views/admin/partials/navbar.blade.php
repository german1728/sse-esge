<!-- Navbar-->
<header class="app-header"><a class="app-header__logo" href="{{ url('/admin') }}">SSE </a>
  <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
    aria-label="Hide Sidebar"></a>
  <ul class="app-nav">

    <!-- User Menu-->
    <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i
          class="fa fa-user fa-lg"></i></a>
      <ul class="dropdown-menu settings-menu dropdown-menu-right">

        <li><a class="dropdown-item" href="{{ url( 'change/password/admin' ) }}"><i class="fa fa-lock fa-lg"></i>Cambiar
            contraseña</a>
        </li>
        <li><a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();"> <i class="fa fa-sign-out fa-lg"></i> Cerrar
            sesión</a></li>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>

      </ul>
    </li>
  </ul>
</header>