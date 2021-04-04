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

        //Give all permissions to role Admin
        Role::findOrFail(1)->permissions()->sync($permissions->pluck('id'));

        //Give permissions to role Usuario
        $user_permissions = $permissions->filter(function ($permission) {
            return substr($permission->name, 0, 5) != 'user_' && substr($permission->name, 0, 5) != 'role_' && substr($permission->name, 0, 11) != 'permission_' && substr($permission->name, 0, 7) != 'module_';
        });
        Role::findOrFail(2)->permissions()->sync($user_permissions);
    }
}
