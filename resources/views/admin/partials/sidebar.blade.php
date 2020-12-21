<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
        <div class="app-sidebar__user"> @if( Auth::user() )

                <img width='50' class="app-sidebar__user-avatar" src="{{ url('assets/images/user-name.png') }}"
                        alt="User Image">

                @endif
                <div>
                        <p class="app-sidebar__user-name">{{ Auth::user()->nombre }}
                        </p>
                        <p class="app-sidebar__user-designation">Admin</p>
                </div>
        </div>
        <ul class="app-menu">
                <li><a class="app-menu__item {{ (request()->is('admin/')) ? 'active' : '' }}"
                                href="{{url('/admin')}}"><i class="app-menu__icon fa fa-dashboard"></i><span
                                        class="app-menu__label">MENÚ
                                        PRINCIPAL</span></a></li>

                <li><a class="app-menu__item {{ (request()->is('admin/egresado*')) ? 'active' : '' }}"
                                href="{{url('/admin/egresado')}}"><i class="app-menu__icon fa fa-group"></i><span
                                        class="app-menu__label">Egresados</span></a></li>
                <li><a class="app-menu__item {{ (request()->is('admin/ofertas*')) ? 'active' : '' }}"
                                href="{{url('/admin/ofertas')}}"><i class="app-menu__icon fa fa-briefcase"></i><span
                                        class="app-menu__label">Ofertas
                                        laborales</span></a></li>
                <li><a class="app-menu__item {{ (request()->is('admin/empresas*')) ? 'active' : '' }}"
                                href="{{url('/admin/empresas')}}"><i class="app-menu__icon fa fa-book"></i><span
                                        class="app-menu__label">Empresas</span></a></li>





                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                                        class="app-menu__icon fa fa-cog"></i><span
                                        class="app-menu__label">Configuraciones</span><i
                                        class="treeview-indicator fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                                <li><a class="treeview-item" href="{{url('change/password/admin')}}"><i
                                                        class="icon fa fa-lock"></i>Cambiar contraseña</a></li>

                        </ul>
                </li>
                <li><a class="app-menu__item " href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form2').submit();"><i
                                        class="app-menu__icon fa fa-sign-out fa-lg"></i><span
                                        class="app-menu__label">Cerrar
                                        sesión </span></a></li>

                <form id="logout-form2" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                </form>

        </ul>
</aside>