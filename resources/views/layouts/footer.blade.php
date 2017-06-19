<footer>
	{!! Html::script('js/jquery-1.12.4.min.js') !!}
	{!! Html::script('js/bootstrap.min.js') !!}
	{!! Html::script('js/select2.min.js') !!}
	{!! Html::script('js/icheck.min.js') !!}
    {!! Html::script('js/AdminLTE-2.3.11/js/app.min.js') !!}
	{!! Html::script('js/jquery.dataTables.min.js') !!}
	<script>
		$(document).ready(function (){
			 $(".paginador").DataTable();
		});
	</script>
	@yield('scripts')
</footer>