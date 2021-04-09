@extends('layouts.admin')
@section('content')
<div class="card">
	<div class="card-header">
		<span class="text-lg font-medium">Editar usuario</span>
		<em><span class="text-red-500">*</span> Campos obligatorios</em>
	</div>
	<div class="card-body">
		<form action="{{route('users.update', $user->id)}}" method="post">
			@method('PUT')
			@csrf
			<label for="name" class="block mt-2 required">
				<span class="text-gray-700">{{__('Nombre')}}</span>
			</label>
			<input id="name" name="name" class="{{ $errors->has('name') ? 'bg-red-100 ': ' ' }} block w-full mt-1 form-input" placeholder="Ingrese el nombre del usuario" value="{{old('name', $user->name)}}" required>
			@if ($errors->has('name'))
			<span class="mt-1 text-sm text-red-600">
				{{$errors->first('name')}}
			</span>
			@endif

			<label for="email" class="block mt-2 required">
				<span class="text-gray-700">{{ __('E-Mail') }}</span>
			</label>
			<input id="email" type="email" class="{{ $errors->has('name') ? 'bg-red-100 ': ' ' }} block w-full mt-1 form-input" name="email" value="{{ old('email', $user->email) }}" required>
			@if ($errors->has('email'))
			<span class="mt-1 text-sm text-red-600">
				{{$errors->first('email')}}
			</span>
			@endif

			<label for="roles" class="block mt-2 required">
				<span class="text-gray-700">{{__('Roles')}}</span>
			</label>
			<select name="roles[]" class="select2" multiple>
				<option value="">Seleccione</option>
				@foreach ($roles as $id => $role)
				<option value="{{$id}}" {{(in_array($id, old('roles', [])) || $user->roles->contains($id)) ? 'selected' : ''}}>{{$role}}</option>
				@endforeach
			</select>
			@if ($errors->has('roles'))
			<span class="mt-1 text-sm text-red-600">
				{{$errors->first('roles')}}
			</span>
			@endif
	</div>
	<div class="card-footer">
		<button type="submit" class="btn btn-primary">Editar</button>
		</form>
	</div>
</div>
@endsection
