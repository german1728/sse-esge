<div class="tile p-0">
    <ul class="nav flex-column nav-tabs user-tabs">

        <li class="nav-item"><a class="nav-link {{ Request::is('*datosPersonales*') ? 'active' : ''}}"
                href="{{url('admin/egresado/datosPersonales/'.$egresado->matricula)}}">Datos personales</a>

        </li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('*primerEmpleo*') ? 'active' : ''}}"
                href="{{url('admin/egresado/primerEmpleo/'.$egresado->matricula)}}">Primer
                empleo</a>

        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('*estudiosRealizados*') ? 'active' : ''}}"
                href="{{url('admin/egresado/estudiosRealizados/'.$egresado->matricula)}}">Estudios realizados</a>

        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('*empleos*') ? 'active' : ''}}"
                href="{{url('admin/egresado/empleos/'.$egresado->matricula)}}">Trayectoria
                laboral</a>

        </li>

    </ul>

</div>