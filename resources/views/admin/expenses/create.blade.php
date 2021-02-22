@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <span class="text-lg font-medium">Registrar gasto</span>
    </div>
    <div class="card-body">
        <form action="{{route('expenses.store')}}" method="post">
            @csrf
            <label for="name" class="block mt-2">
                <span class="text-gray-700">Gasto</span>
                <input id="name" name="name" class="block w-full mt-1 form-input" placeholder="Ingrese el nombre del gasto">
            </label>
            <label for="amount" class="block mt-2">
                <span class="text-gray-700">Cantidad</span>
                <input id="amount" name="amount" class="block w-full mt-1 form-input" placeholder="Ingrese la cantidad del gasto">
            </label>
            <label for="entry_date" class="block mt-2">
                <span class="text-gray-700">Fecha del gasto</span>
                <input id="entry_date" name="entry_date" class="block w-full mt-1 form-input" placeholder="Ingrese la cantidad del gasto">
            </label>
            <label for="description" class="block mt-2">
                <span class="text-gray-700">Descripcion</span>
                <input id="description" name="description" class="block w-full mt-1 form-input" placeholder="Ingrese la cantidad del gasto">
            </label>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>
</div>
@endsection
