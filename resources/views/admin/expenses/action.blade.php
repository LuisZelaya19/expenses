<a href="{{route('expenses.edit', $id)}}" class="btn btn-sm btn-light-primary" x-data="tooltip()" x-spread="tooltip" x-position="top" title="Editar gasto">
    <i class="fas fa-edit"></i>
</a>
<button class="btn btn-sm btn-danger delete" data-id="{{$id}}">
    <i class="fas fa-trash-alt"></i>
</button>
