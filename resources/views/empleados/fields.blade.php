<!-- Dni Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dni', 'Dni:') !!}
    {!! Form::number('dni', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Apellido Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellido', 'Apellido:') !!}
    {!! Form::text('apellido', null, ['class' => 'form-control']) !!}
</div>

<!-- Fecha Nac Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_nac', 'Fecha Nac:') !!}
    {!! Form::date('fecha_nac', isset($empleado) ? $empleado->fecha_nac : null, ['class' => 'form-control']) !!}
</div>
	
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email: ') !!}
    {!! Form::email('email', isset($empleado) ? $empleado->user['email'] : null , ['class' => 'form-control']) !!}
</div>
	
<div class="form-group col-sm-6">
    {!! Form::label('area', 'Area ') !!}
	{!! Form::select('area', $areas, isset($empleado) ? $empleado->area->id : null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary','id'=>'guardar_emp']) !!}
    <a href="{!! route('empleados.index') !!}" class="btn btn-default">Cancelar</a>
</div>