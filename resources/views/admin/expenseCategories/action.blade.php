@can('expense_category_edit')
<a href="{{route('expenseCategories.edit', $id)}}" class="btn btn-sm btn-light-primary">
	<i class="fas fa-edit"></i>
</a>
@endcan
<a href="#" class="btn btn-sm btn-danger">
	<i class="fas fa-trash-alt"></i>
</a>
