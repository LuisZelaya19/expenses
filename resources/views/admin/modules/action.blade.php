@can('module_edit')
<a href="{{route('modules.edit', $id)}}" class="btn btn-sm btn-light-primary" x-data="tooltip()" x-spread="tooltip" x-position="top" title="Editar ingreso">
	<i class="fas fa-edit"></i>
</a>
@endcan
<a href="#" class="btn btn-sm btn-danger">
	<i class="fas fa-trash-alt"></i>
</a>
