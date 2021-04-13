@can('user_edit')
<a href="{{route('users.edit', $id)}}" class="btn btn-sm btn-light-primary">
	<i class="fas fa-edit"></i>
</a>
@endcan
@can('user_delete')
<button class="btn btn-sm btn-danger delete" data-id="{{$id}}">
	<i class="fas fa-trash-alt"></i>
</button>
@endcan
