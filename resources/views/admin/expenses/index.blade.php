@extends('layouts.admin')
@section('content')
<div class="mb-3 grid justify-items-end">
	@can('expense_create')
	<a class="btn btn-primary" href="{{route('expenses.create')}}">
		<i class="fas fa-plus"></i> Nuevo
	</a>
	@endcan
</div>
<div class="card">
	<div class="card-header">
		<span class="text-lg font-medium">Control de gastos</span>
	</div>
	<div class="card-body">
		<table class="stripe hover expense_table" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
			<thead>
				<tr>
					<td>Gasto</td>
					<td>Monto</td>
					<td>Fecha</td>
					<td>Descripcion</td>
					<td>Acciones</td>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
	</div>
</div>
@endsection
@section('scripts')
<script>
	$(document).ready(function() {
		let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$('.expense_table').on('draw.dt', function() {
			$('[data-toggle="tooltip"]').tooltip();
		});

		let table = $('.expense_table').DataTable({
				processing: true,
				serverSide: true,
				responsive: true,
				buttons: dtButtons,
				ajax: "{{route('expenses.index')}}",
				dataType: 'json',
				type: "POST",
				columns: [{
						data: 'expense',
						name: 'expense'
					},
					{
						data: 'amount',
						name: 'amount',
						searchable: false
					},
					{
						data: 'entry_date',
						name: 'entry_date'
					},
					{
						data: 'description',
						name: 'description',
						searchable: false
					},
					{
						data: 'action',
						name: 'action',
						searchable: false,
						orderable: false
					}
				],
			})
			.columns.adjust()
			.responsive.recalc();
	});
</script>
@endsection
