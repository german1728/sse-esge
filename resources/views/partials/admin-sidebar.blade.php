<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img width='50' class="app-sidebar__user-avatar"
            src="https://cpng.pikpng.com/pngl/s/16-169348_user-icon-user-white-icon-transparent-clipart.png"
            alt="User Image">
        <div>
            <p class="app-sidebar__user-name">ADMINISTRADOR </p>
            <p class="app-sidebar__user-designation"> </p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item {{ (request()->is('admin')) ? 'active' : '' }}" href="{{url('/admin')}}"><i
                    class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">MENÚ
                    PRINCIPAL</span></a></li>
        <li><a class="app-menu__item " href="dashboard.html"><i class="app-menu__icon fa fa-id-card"></i><span
                    class="app-menu__label">Egresados</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        </li>

        <li><a class="app-menu__item {{ (request()->is('admin/usuarios*')) ? 'active' : '' }} "
                href="{{URL('admin/usuarios')}}"><i class="app-menu__icon fa fa-graduation-cap"></i><span
                    class="app-menu__label">usuarios</span><i class="treeview-indicator fa fa-angle-right"></i></a></li>
        <li><a class="app-menu__item " href="dashboard.html"><i class="app-menu__icon fa fa-briefcase"></i><span
                    class="app-menu__label">empresas</span><i class="treeview-indicator fa fa-angle-right"></i></a></li>


        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                    class="app-menu__icon fa fa-cog"></i><span class="app-menu__label">Configuraciones</span><i
                    class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="form-components.html"><i class="icon fa fa-lock"></i>Cambiar
                        contraseña</a></li>

            </ul>
        </li>
        <li><a class="app-menu__item " href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i
                    class="app-menu__icon fa fa-sign-out fa-lg"></i><span class="app-menu__label">Cerrar sesión
                </span></a></li>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>

    </ul>
</aside>