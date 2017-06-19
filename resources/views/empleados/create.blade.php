@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Empleado
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'empleados.store','id' => 'emp_form']) !!}

                        @include('empleados.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
	@parent
	<script>
	$("#emp_form").submit(function(event) {
					var area_id = $('#area').val();
					var url = "{!! route('agregar_empleados',['area_id'=> '' ]) !!}"+"/"+area_id;
					$.ajax({
						url: url,
						type:'GET',
					dataType: 'text'})
					.done(function(data){
							if (data == 'false'){
								alert("No se pueden agregar más empleados");
							}
						})
						.fail(function(responseText){
							alert("ERROR :: ");
						});
						event.preventDefault();
					});
					
	</script>
@endsection