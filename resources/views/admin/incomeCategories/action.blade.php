@can('income_category_edit')
<a href="{{route('incomeCategories.edit', $id)}}" class="btn btn-sm btn-light-primary">
	<i class="fas fa-edit"></i>
</a>
@endcan
<button class="btn btn-sm btn-danger delete" data-id="{{$id}}">
	<i class="fas fa-trash-alt"></i>
</button>
