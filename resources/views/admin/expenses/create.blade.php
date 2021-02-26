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
                <input id="name" name="name" class="{{ $errors->has('name') ? 'bg-red-100 ': ' ' }} block w-full mt-1 form-input" placeholder="Ingrese el nombre del gasto" value="{{old('name', '')}}">
            </label>
            @if ($errors->has('name'))
            <span class="mt-1 text-sm text-red-600">
                {{$errors->first('name')}}
            </span>
            @endif
            <label for="amount" class="block mt-2">
                <span class="text-gray-700">Cantidad</span>
                <input id="amount" name="amount" class="{{$errors->has('amount') ? 'bg-red-100 ': ' '}} block w-full mt-1 form-input" placeholder="Ingrese la cantidad del gasto" value="{{old('amount', '')}}">
            </label>
            @if ($errors->has('amount'))
            <span class="mt-1 text-sm text-red-600">
                {{$errors->first('amount')}}
            </span>
            @endif
            <label for="entry_date" class="block mt-2">
                <span class="text-gray-700">Fecha del gasto</span>
                <input id="entry_date" name="entry_date" class="{{$errors->has('entry_date') ? 'bg-red-100 ' : ' '}} block w-full mt-1 form-input datepicker" placeholder="Ingrese la fecha del gasto" autocomplete="off" readonly value="{{old('entry_date', '')}}">
                @if ($errors->has('entry_date'))
                <span class="mt-1 text-sm text-red-600">
                    {{$errors->first('entry_date')}}
                </span>
                @endif
            </label>
            <label for="description" class="block mt-2">
                <span class="text-gray-700">Descripcion</span>
                <textarea name="description" id="description" class="form-input" rows="8" cols="40"></textarea>
            </label>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>
</div>
@endsection
