@extends('layouts.admin')
@section('content')
<div class="mb-4 grid justify-items-end">
    <a class="btn btn-primary" href="{{route('permissions.create')}}">
        <i class="fas fa-plus"></i> Nuevo
    </a>
</div>
<div class="card">
    <div class="card-header">
        <span class="text-lg font-medium">Permisos</span>
    </div>
    <div class="card-body">
        <table class="stripe hover permission_table" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <td>Permiso</td>
                    <td>Descripcion</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        let table = $('.permission_table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                buttons: dtButtons,
                ajax: "{{route('permissions.index')}}",
                dataType: 'json',
                type: "POST",
                columns: [{
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        searchable: false,
                        orderable: false
                    }
                ],
            })
            .columns.adjust()
            .responsive.recalc();
    });
</script>
@endsection
