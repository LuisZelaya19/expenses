<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name' => 'user_access',
                'permission_group' => 'Usuario',
                'description' => 'Acceder al listado de usuarios'
            ],
            [
                'name' => 'user_create',
                'permission_group' => 'Usuario',
                'description' => 'Crear nuevos usuarios'
            ],
            [
                'name' => 'user_edit',
                'permission_group' => 'Usuario',
                'description' => 'Editar usuarios'
            ],
            [
                'name' => 'user_view',
                'permission_group' => 'Usuario',
                'description' => 'Ver detalles del usuario'
            ],
            [
                'name' => 'user_delete',
                'permission_group' => 'Usuario',
                'description' => 'Eliminar usuarios'
            ],
            [
                'name' => 'role_access',
                'permission_group' => 'Roles',
                'description' => 'Acceder al listado de roles'
            ],
            [
                'name' => 'role_create',
                'permission_group' => 'Roles',
                'description' => 'Crear nuevo rol'
            ],
            [
                'name' => 'role_edit',
                'permission_group' => 'Roles',
                'description' => 'Editar roles'
            ],
            [
                'name' => 'role_view',
                'permission_group' => 'Roles',
                'description' => 'Ver detalles del rol'
            ],
            [
                'name' => 'role_delete',
                'permission_group' => 'Roles',
                'description' => 'Eliminar rol'
            ],
            [
                'name' => 'permission_access',
                'permission_group' => 'Permisos',
                'description' => 'Acceder al listado de permisos'
            ],
            [
                'name' => 'permission_create',
                'permission_group' => 'Permisos',
                'description' => 'Crear nuevo permiso'
            ],
            [
                'name' => 'permission_edit',
                'permission_group' => 'Permisos',
                'description' => 'Editar permisos'
            ],
            [
                'name' => 'permission_view',
                'permission_group' => 'Permisos',
                'description' => 'Ver detalles del permiso'
            ],
            [
                'name' => 'permission_delete',
                'permission_group' => 'Permisos',
                'description' => 'Eliminar permiso'
            ],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
