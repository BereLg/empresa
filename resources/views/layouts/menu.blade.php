<li class="{{ Request::is('empleados*') ? 'active' : '' }}">
    <a href="{!! route('empleados.index') !!}"><i class="fa fa-edit"></i><span>Empleados</span></a>
</li>

<li class="{{ Request::is('areas*') ? 'active' : '' }}">
    <a href="{!! route('areas.index') !!}"><i class="fa fa-edit"></i><span>Areas</span></a>
</li>

