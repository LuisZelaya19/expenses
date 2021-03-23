@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <span class="text-lg font-medium">Registrar modulo</span>
        <em>(* Campos obligatorios)</em>
    </div>
    <div class="card-body">
        <form action="{{route('modules.store')}}" method="post">
            @csrf
            <label for="name" class="block mt-3 required">
                <span class="text-gray-700">Modulo</span>
            </label>
            <input id="name" name="name" class="{{ $errors->has('name') ? 'bg-red-100 ': ' ' }} block w-full mt-1 form-input" placeholder="Ingrese el nombre del modulo" value="{{old('name', '')}}">
            @if ($errors->has('name'))
            <span class="mt-1 text-sm text-red-600">
                {{$errors->first('name')}}
            </span>
            @endif
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>
</div>
@endsection
