@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <span class="text-lg font-medium">Editar rol</span>
    </div>
    <div class="card-body">
        <form action="{{route('roles.update', $role->id)}}" method="post">
            @csrf
            @method('PUT')
            <label for="name" class="block mt-2">
                <span class="text-gray-700">Rol</span>
                <input id="name" name="name" class="{{ $errors->has('name') ? 'bg-red-100 ': ' ' }} block w-full mt-1 form-input" placeholder="Ingrese el nombre del rol" value="{{old('name', $role->name)}}">
            </label>
            @if ($errors->has('name'))
            <span class="mt-1 text-sm text-red-600">
                {{$errors->first('name')}}
            </span>
            @endif
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>
</div>
@endsection
