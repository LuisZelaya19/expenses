@extends('layouts.admin')
@section('content')
{{--<h3 class="text-3xl font-medium text-gray-700">Gastos</h3>--}}
<div class="mb-4 grid justify-items-end">
    <a class="btn btn-primary" href="{{route('expenses.create')}}">
        <i class="fas fa-plus"></i> Nuevo
    </a>
</div>
<div class="card">
    <div class="card-header">
        <span class="text-lg font-medium">Control de gastos</span>
    </div>
    <div class="card-body">
        <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
            <thead>
                <tr>
                    <td>Nombre</td>
                    <td>Fecha</td>
                    <td></td>
                </tr>
        </table>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
        let table = $('#example').DataTable({
                responsive: true,
            })
            .responsive.recalc();
    });
</script>
@endsection
