@extends('layouts.admin')
@section('content')
<div class="mb-4 grid justify-items-end">
	@can('income_category_create')
	<a class="btn btn-primary" href="{{route('incomeCategories.create')}}">
		<i class="fas fa-plus"></i> Nuevo
	</a>
	@endcan
</div>
<div class="card">
	<div class="card-header">
		<span class="text-lg font-medium">Control de categorias de ingresos</span>
	</div>
	<div class="card-body">
		<table class="stripe hover income_table" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
			<thead>
				<tr>
					<td>Ingreso</td>
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

		let table = $('.income_table').DataTable({
				processing: true,
				serverSide: true,
				responsive: true,
				buttons: dtButtons,
				ajax: "{{route('incomeCategories.index')}}",
				type: "POST",
				columns: [{
					data: "name",
					name: "name"
				}, {
					data: 'action',
					name: 'action',
					orderable: false,
					searchable: false
				}],
			})
			.columns.adjust()
			.responsive.recalc();
	});
</script>
@endsection
