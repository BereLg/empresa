<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Sector Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sector', 'Sector:') !!}
    {!! Form::text('sector', null, ['class' => 'form-control']) !!}
</div>

<!-- Max Cant Empleados Field -->
<div class="form-group col-sm-6">
    {!! Form::label('max_cant_empleados', 'Max Cant Empleados:') !!}
    {!! Form::number('max_cant_empleados', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('areas.index') !!}" class="btn btn-default">Cancel</a>
</div>
