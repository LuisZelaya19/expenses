@extends('layouts.admin')
@section('content')
<div class="mb-4 grid justify-items-end">
    <a class="btn btn-primary" href="{{route('modules.create')}}">
        <i class="fas fa-plus"></i> Nuevo
    </a>
</div>
<div class="card">
    <div class="card-header">
        <span class="text-lg font-medium">Control de modulos</span>
    </div>
    <div class="card-body">
        <table class="stripe hover module_table" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <td>Modulo</td>
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

        let table = $('.module_table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                buttons: dtButtons,
                ajax: "{{route('modules.index')}}",
                type: "POST",
                columns: [{
                        data: "name",
                        name: "name"
                    },
                    {
                        data: "action",
                        name: "action",
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
