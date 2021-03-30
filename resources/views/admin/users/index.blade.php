@extends('layouts.admin')
@section('content')
<div class="mb-4 grid justify-items-end">
	@can('user_create')
	<a class="btn btn-primary" href="{{route('users.create')}}">
		<i class="fas fa-plus"></i> Nuevo
	</a>
	@endcan
</div>
<div class="card">
	<div class="card-header">
		<span class="text-lg font-medium">Control de usuarios</span>
	</div>
	<div class="card-body">
		<table class="stripe hover user_table" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
			<thead>
				<tr>
					<td>Usuario</td>
					<td>Email</td>
					<td>Roles</td>
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

		let table = $('.user_table').DataTable({
				processing: true,
				serverSide: true,
				responsive: true,
				buttons: dtButtons,
				ajax: "{{route('users.index')}}",
				dataType: 'json',
				type: "POST",
				columns: [{
						data: 'name',
						name: 'name'
					},
					{
						data: 'email',
						name: 'email'
					},
					{
						data: 'roles',
						name: 'roles'
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
