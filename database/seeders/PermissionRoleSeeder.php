<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions =  Permission::all();

        //Asignar permisos al rol Admin
        Role::findOrFail(1)->permissions()->sync($permissions->pluck('id'));
    }
}
