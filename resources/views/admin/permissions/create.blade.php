@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <span class="text-lg font-medium">Registrar permiso</span>
    </div>
    <div class="card-body">
        <form action="{{route('permissions.store')}}" method="post">
            @csrf
            <label for="name" class="block mt-2">
                <span class="text-gray-700">Permiso</span>
                <input id="name" name="name" class="{{ $errors->has('name') ? 'bg-red-100 ': ' ' }} block w-full mt-1 form-input" placeholder="Ingrese el nombre del permiso" value="{{old('name', '')}}">
            </label>
            @if ($errors->has('name'))
            <span class="mt-1 text-sm text-red-600">
                {{$errors->first('name')}}
            </span>
            @endif
            <label for="name" class="block mt-2">
                <span class="text-gray-700">Modulo</span>
                <input id="permission_group" name="permission_group" class="{{ $errors->has('permission_group') ? 'bg-red-100 ': ' ' }} block w-full mt-1 form-input" placeholder="Ingrese el nombre del grupo del permiso" value="{{old('permission_group', '')}}">
            </label>
            @if ($errors->has('name'))
            <span class="mt-1 text-sm text-red-600">
                {{$errors->first('name')}}
            </span>
            @endif
            <label for="description" class="block mt-2">
                <span class="text-gray-700">Descripcion</span>
                <input id="description" name="description" class="{{ $errors->has('description') ? 'bg-red-100 ': ' ' }} block w-full mt-1 form-input" placeholder="Ingrese la descripcion del permiso" value="{{old('description', '')}}">
            </label>
            @if ($errors->has('description'))
            <span class="mt-1 text-sm text-red-600">
                {{$errors->first('description')}}
            </span>
            @endif
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>
</div>
@endsection
