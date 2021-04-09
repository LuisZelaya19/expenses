@extends('layouts.admin')
@section('content')
<div class="card">
	<div class="card-header">
		<span class="text-lg font-medium">Registrar usuario</span>
		<em><span class="text-red-500">*</span> Campos obligatorios</em>
	</div>
	<div class="card-body">
		<form action="{{route('users.store')}}" method="post">
			@csrf
			<label for="name" class="block mt-2 required">
				<span class="text-gray-700">{{__('Nombre')}}</span>
			</label>
			<input id="name" name="name" class="{{ $errors->has('name') ? 'bg-red-100 ': ' ' }} block w-full mt-1 form-input" placeholder="Ingrese el nombre del usuario" value="{{old('name', '')}}" required>
			@if ($errors->has('name'))
			<span class="mt-1 text-sm text-red-600">
				{{$errors->first('name')}}
			</span>
			@endif

			<label for="email" class="block mt-2 required">
				<span class="text-gray-700">{{ __('E-Mail') }}</span>
			</label>
			<input id="email" type="email" class="{{ $errors->has('name') ? 'bg-red-100 ': ' ' }} block w-full mt-1 form-input" name="email" value="{{ old('email') }}" required>
			@if ($errors->has('email'))
			<span class="mt-1 text-sm text-red-600">
				{{$errors->first('email')}}
			</span>
			@endif

			<label for="password" class="block mt-2 required">
				<span class="text-gray-700">{{ __('Password') }}</span>
			</label>
			<input id="password" type="password" class="form-input" name="password" required>
			@if ($errors->has('password'))
			<span class="mt-1 text-sm text-red-600">
				{{$errors->first('password')}}
			</span>
			@endif

			<label for="password_confirmation" class="block mt-2 required">
				<span class="text-gray-700">{{ __('Confirmar Password') }}</span>
			</label>
			<input id="password-confirm" type="password" class="form-input" name="password_confirmation" required>
			@if ($errors->has('password_confirmation'))
			<span class="mt-1 text-sm text-red-600">
				{{$errors->first('password_confirmation')}}
			</span>
			@endif

			<label for="roles" class="block mt-2 required">
				<span class="text-gray-700">{{__('Roles')}}</span>
			</label>
			<select name="roles[]" class="select2" multiple>
				<option value="">Seleccione</option>
				@foreach ($roles as $id => $role)
				<option value="{{$id}}">{{$role}}</option>
				@endforeach
			</select>
			@if ($errors->has('roles'))
			<span class="mt-1 text-sm text-red-600">
				{{$errors->first('roles')}}
			</span>
			@endif
	</div>
	<div class="card-footer">
		<button type="submit" class="btn btn-primary">Registrar</button>
		</form>
	</div>
</div>
@endsection
