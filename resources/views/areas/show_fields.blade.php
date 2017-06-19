<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $area->id !!}</p>
</div>

<!-- Nombre Field -->
<div class="form-group">
    {!! Form::label('nombre', 'Nombre:') !!}
    <p>{!! $area->nombre !!}</p>
</div>

<!-- Sector Field -->
<div class="form-group">
    {!! Form::label('sector', 'Sector:') !!}
    <p>{!! $area->sector !!}</p>
</div>

<!-- Max Cant Empleados Field -->
<div class="form-group">
    {!! Form::label('max_cant_empleados', 'Max Cant Empleados:') !!}
    <p>{!! $area->max_cant_empleados !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $area->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $area->updated_at !!}</p>
</div>

