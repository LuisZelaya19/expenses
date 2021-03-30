@extends('layouts.admin')
@section('content')
<div class="card">
	<div class="card-header">
		<span class="text-lg font-medium">Registrar gasto</span>
		<em><span class="text-red-500">*</span> Campos obligatorios</em>
	</div>
	<div class="card-body">
		<form action="{{route('expenses.store')}}" method="post">
			@csrf
			<label class="block mt-3 required" for="expense_category_id">
				<span class="text-gray-700">Tipo de gasto</span>
			</label>
			<select name="expense_category_id" class="select2">
				<option value="">Seleccione</option>
				@foreach ($expense_categories as $id => $expense_category)
				<option value="{{$id}}" {{old('expense_category_id') == $id ? 'selected' : ''}}>{{$expense_category}}</option>
				@endforeach
			</select>
			@if ($errors->has('expense_category_id'))
			<span class="mt-1 text-sm text-red-600">
				{{$errors->first('expense_category_id')}}
			</span>
			@endif

			<label for="amount" class="block mt-3 required">
				<span class="text-gray-700">Monto del gasto</span>
			</label>
			<input id="amount" name="amount" class="{{$errors->has('amount') ? 'bg-red-100 ': ' '}} block w-full mt-1 form-input" placeholder="Ingrese la cantidad del gasto" value="{{old('amount', '')}}">
			@if ($errors->has('amount'))
			<span class="mt-1 text-sm text-red-600">
				{{$errors->first('amount')}}
			</span>
			@endif

			<label for="entry_date" class="block mt-3 required">
				<span class="text-gray-700">Fecha del gasto</span>
			</label>
			<input id="entry_date" name="entry_date" class="{{$errors->has('entry_date') ? 'bg-red-100 ' : ' '}} block w-full mt-1 form-input datepicker" placeholder="Ingrese la fecha del gasto" autocomplete="off" readonly value="{{old('entry_date', '')}}">
			@if ($errors->has('entry_date'))
			<span class="mt-1 text-sm text-red-600">
				{{$errors->first('entry_date')}}
			</span>
			@endif

			<label for="description" class="block mt-3">
				<span class="text-gray-700">Descripcion</span>
			</label>
			<textarea name="description" id="description" class="form-input" rows="8" cols="40">{{old('description', '')}}</textarea>
	</div>
	<div class="card-footer">
		<button type="submit" class="btn btn-primary">Registrar</button>
		</form>
	</div>
</div>
@endsection
