<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>User list - PDF</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{ URL::asset('css/buttons.dataTables.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/jquery.dataTables.min.css') }}">
	
	{!!Html::script('js/jquery-1.12.4.js')!!}
	{!!Html::script('js/jquery.dataTables.min.js')!!}
	{!!Html::script('js/dataTables.buttons.min.js')!!}
	{!!Html::script('js/buttons.flash.min.js')!!}
	{!!Html::script('js/jszip.min.js')!!}
	{!!Html::script('js/pdfmake.min.js')!!}
	{!!Html::script('js/vfs_fonts.js')!!}
	{!!Html::script('js/buttons.html5.min.js')!!}
	{!!Html::script('js/buttons.print.min.js')!!}
<style>
body {
    font-family: DejaVu Sans;
}
.page-break {
    page-break-after: always;
}
	
</style>
</head>
<body>
<div class="container">
	<a href="{{ route('generate-pdf',['download'=>'pdf']) }}">Download PDF</a>
	<table class="table table-bordered" id="example">
		<thead>
			<th>Name</th>
			<th>Email</th>
		</thead>
		<tbody>
			@foreach ($users as $key => $value)
			<tr>
				<td>{{ $value->name }}</td>
				<td>{{ $value->email }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>


<script>
	$(document).ready(function() {
		$('#example').DataTable( {
			dom: 'Bfrtip',
			buttons: [
				'copyHtml5',
				'excelHtml5',
				'csvHtml5',
				'pdfHtml5'
			]
		} );
	} );
	
</script>
</body>
</html>