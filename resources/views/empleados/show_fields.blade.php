<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $empleado->id !!}</p>
</div>

<!-- Dni Field -->
<div class="form-group">
    {!! Form::label('dni', 'Dni:') !!}
    <p>{!! $empleado->dni !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $empleado->nombre !!}</p>
</div>

<!-- Apellido Field -->
<div class="form-group">
    {!! Form::label('apellido', 'Apellido:') !!}
    <p>{!! $empleado->apellido !!}</p>
</div>

<!-- Fecha Nac Field -->
<div class="form-group">
    {!! Form::label('fecha_nac', 'Fecha Nac:') !!}
    <p>{!! $empleado->fecha_nac !!}</p>
</div>

<!-- Area Id Field -->
<div class="form-group">
    {!! Form::label('area_id', 'Area:') !!}
    <p>{!! $empleado->area->nombre !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'Correo:') !!}
    <p>{!! $usuario->email !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $empleado->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $empleado->updated_at !!}</p>
</div>

