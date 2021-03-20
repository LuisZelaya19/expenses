@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <span class="text-lg font-medium">Registrar rol</span>
    </div>
    <div class="card-body">
        <form action="{{route('roles.store')}}" method="post">
            @csrf
            <label for="name" class="block mt-2">
                <span class="text-gray-700">Rol</span>
                <input id="name" name="name" class="{{ $errors->has('name') ? 'bg-red-100 ': ' ' }} block w-full mt-1 form-input" placeholder="Ingrese el nombre del rol" value="{{old('name', '')}}">
            </label>
            @if ($errors->has('name'))
            <span class="mt-1 text-sm text-red-600">
                {{$errors->first('name')}}
            </span>
            @endif
            <h3 class="mt-4 mb-2 text-lg font-medium text-center">
                Listado de permisos
            </h3>
            <div x-data="selectCheckboxes()">
                <input type="checkbox" name="selectAll" id="selectAll" class="form-checkbox" @click="toggleAllCheckboxes">
                <span class="ml-2 cursor-pointer">Seleccionar todo</span>
                <hr class="mt-2">
                <label for="permissions" class="block mt-2">
                    @foreach ($modules as $key => $module)
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-3">
                            <label for="modules" class="flex items-center">
                                <input type="checkbox" class="form-checkbox" name="modules[]" id="module{{$module->id}}" value="">
                                <span class="ml-2 cursor-pointer">{{$module->name}}</span>
                            </label>
                        </div>
                        <div class="col-span-9">
                            @foreach ($permissions['data'][$key] as $permission)
                            <label for="permissions" class="flex items-center mt-2 mb-2">
                                <input type="checkbox" id="permission{{$permission->id}}" class="form-checkbox" name="permissions[]" value="{{$permission['id']}}">
                                <span class="ml-2 cursor-pointer">{{$permission['description']}}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                    <hr class="mt-2 mb-2">
                    @endforeach
                </label>
            </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script>
    function selectCheckboxes() {
        return {
            checked: false,
            toggleAllCheckboxes: function() {
                this.checked = !this.checked;

                checkboxes = document.querySelectorAll('[id^=permission], [id^=module]');
                [...checkboxes].map((element) => {
                    element.checked = this.checked;
                })
            }
        }
    }
</script>
@endsection
