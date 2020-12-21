<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
        <div class="app-sidebar__user"> @if( Auth::user() )
                @if(Auth::user()->egresado->imagen_url)
                <img width='50' class="app-sidebar__user-avatar" src="{{ url(Auth::user()->egresado->imagen_url) }}"
                        alt="User Image">
                @else
                <img width='50' class="app-sidebar__user-avatar" src="{{ url('assets/images/user-name.png') }}"
                        alt="User Image">
                @endif
                @endif
                <div>
                        <p class="app-sidebar__user-name">{{ Auth::user()->egresado->nombres }}
                        </p>
                        <p class="app-sidebar__user-designation">Usuario</p>
                </div>
        </div>
        <ul class="app-menu">
                <li><a class="app-menu__item {{ (request()->is('user')) ? 'active' : '' }}" href="{{url('/')}}"><i
                                        class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">MENÚ
                                        PRINCIPAL</span></a></li>

                <li><a class="app-menu__item {{ (request()->is('ofertas')) ? 'active' : '' }}"
                                href="{{url('ofertas')}}"><i class="app-menu__icon fa fa-briefcase"></i><span
                                        class="app-menu__label">Ofertas
                                        laborales</span></a></li>
                <li><a class="app-menu__item {{ (request()->is('directorio')) ? 'active' : '' }}"
                                href="{{url('directorio')}}"><i class="app-menu__icon fa fa-book"></i><span
                                        class="app-menu__label">Directorio de empresas</span></a></li>
                <li><a class="app-menu__item {{ (request()->is('ranking')) ? 'active' : '' }}"
                                href="{{url('ranking')}}"><i class="app-menu__icon fa fa-trophy"></i><span
                                        class="app-menu__label">Ranking
                                        de empresas</span></a></li>



                <li class="treeview"><a class="app-menu__item {{ (request()->is('perfil*')) ? 'active' : '' }}" href="#"
                                data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i><span
                                        class="app-menu__label">Mi
                                        perfil</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                        <ul class="treeview-menu ">
                                <a class="treeview-item  {{ (request()->is('perfil')) ? 'active' : '' }}"
                                        href="{{url('perfil')}}"><i class="app-menu__icon fa fa-id-card"></i><span
                                                class="app-menu__label">Datos
                                                personales</span></a>


                        </ul>
                        <ul class="treeview-menu ">
                                <a class="treeview-item  {{ (request()->is('perfil/primerEmpleo')) ? 'active' : '' }}"
                                        href="{{url('perfil/primerEmpleo')}}"><i
                                                class="app-menu__icon fa fa-folder-open"></i><span
                                                class="app-menu__label">Mi
                                                primer empleo</span></a>


                        </ul>
                        <ul class="treeview-menu ">
                                <a class="treeview-item  {{ (request()->is('perfil/estudiosRealizados')) ? 'active' : '' }}"
                                        href="{{url('perfil/estudiosRealizados')}}"><i
                                                class="app-menu__icon fa fa-graduation-cap"></i><span
                                                class="app-menu__label">Estudios
                                                realizados</span></a>


                        </ul>
                        <ul class="treeview-menu ">
                                <a class="treeview-item  {{ (request()->is('perfil/empleos')) ? 'active' : '' }}"
                                        href="{{url('perfil/empleos')}}"><i
                                                class="app-menu__icon fa fa-briefcase"></i><span
                                                class="app-menu__label">Trayectoria laboral </span></a>


                        </ul>

                </li>




                <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                                        class="app-menu__icon fa fa-cog"></i><span
                                        class="app-menu__label">Configuraciones</span><i
                                        class="treeview-indicator fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                                <li><a class="treeview-item" href="{{url('change/password')}}"><i
                                                        class="icon fa fa-lock"></i>Cambiar contraseña</a></li>

                        </ul>
                </li>
                <li><a class="app-menu__item " href="{{ route('user.logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form2').submit();"><i
                                        class="app-menu__icon fa fa-sign-out fa-lg"></i><span
                                        class="app-menu__label">Cerrar
                                        sesión </span></a></li>

                <form id="logout-form2" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                </form>

        </ul>
</aside>