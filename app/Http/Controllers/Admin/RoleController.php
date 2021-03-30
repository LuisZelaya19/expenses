<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Module;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('role_access'), Response::HTTP_FORBIDDEN, '403 Acceso denegado');

        if (request()->ajax()) {
            $roles =  Role::with('permissions')->select('roles.*');

            return DataTables::of($roles)
                ->addColumn('permissions', function (Role $role) {
                    return $role->permissions->map(function ($permissions) {
                        return '<span class="text-white badge bg-primary">' . $permissions->name . '</span>';
                    })->implode(' ');
                })
                ->addColumn('action', 'admin.roles.action')
                ->rawColumns(['action', 'permissions'])
                ->make(true);
        }
        return view('admin.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Acceso denegado');

        $modules = Module::select('id', 'name')->get();

        $permissions = [];

        foreach ($modules as $key => $module) {
            $permissions['data'][$key] = Permission::select('id', 'name', 'description')->where('module_id', $module->id)->get();
        }

        collect($permissions)->toArray();

        return view('admin.roles.create', compact('modules', 'permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        $role = Role::create($request->validated());

        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('roles.index')->withSuccess('Rol agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        abort_if(Gate::denies('role_edit'), Response::HTTP_FORBIDDEN, '403 Acceso denegado');

        $modules = Module::select('id', 'name')->get();

        $role->load('permissions');

        $permissions = [];

        foreach ($modules as $key => $module) {
            $permissions['data'][$key] = Permission::select('id', 'name', 'description')->where('module_id', $module->id)->get();
        }

        collect($permissions)->toArray();

        return view('admin.roles.edit', compact('role', 'modules', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->validated());

        $role->permissions()->sync($request->input('permissions', []));

        return redirect()->route('roles.index')->withSuccess('Rol editado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
