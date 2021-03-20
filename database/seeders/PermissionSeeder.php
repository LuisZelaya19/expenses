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
                'description' => 'Acceder al listado de usuarios',
                'module_id' => 1,
            ],
            [
                'name' => 'user_create',
                'description' => 'Crear nuevos usuarios',
                'module_id' => 1
            ],
            [
                'name' => 'user_edit',
                'description' => 'Editar usuarios',
                'module_id' => 1
            ],
            [
                'name' => 'user_view',
                'description' => 'Ver detalles del usuario',
                'module_id' => 1
            ],
            [
                'name' => 'user_delete',
                'description' => 'Eliminar usuarios',
                'module_id' => 1
            ],
            [
                'name' => 'role_access',
                'description' => 'Acceder al listado de roles',
                'module_id' => 2
            ],
            [
                'name' => 'role_create',
                'description' => 'Crear nuevo rol',
                'module_id' => 2
            ],
            [
                'name' => 'role_edit',
                'description' => 'Editar roles',
                'module_id' => 2
            ],
            [
                'name' => 'role_view',
                'description' => 'Ver detalles del rol',
                'module_id' => 2
            ],
            [
                'name' => 'role_delete',
                'description' => 'Eliminar rol',
                'module_id' => 2
            ],
            [
                'name' => 'permission_access',
                'description' => 'Acceder al listado de permisos',
                'module_id' => 3
            ],
            [
                'name' => 'permission_create',
                'description' => 'Crear nuevo permiso',
                'module_id' => 3
            ],
            [
                'name' => 'permission_edit',
                'description' => 'Editar permisos',
                'module_id' => 3
            ],
            [
                'name' => 'permission_view',
                'description' => 'Ver detalles del permiso',
                'module_id' => 3
            ],
            [
                'name' => 'permission_delete',
                'description' => 'Eliminar permiso',
                'module_id' => 3
            ],
            [
                'name' => 'module_access',
                'description' => 'Acceder al listado de modulos',
                'module_id' => 4,
            ],
            [
                'name' => 'module_create',
                'description' => 'Crear nuevos modulos',
                'module_id' => 4
            ],
            [
                'name' => 'module_edit',
                'description' => 'Editar modulos',
                'module_id' => 4
            ],
            [
                'name' => 'module_view',
                'description' => 'Ver detalles del modulo',
                'module_id' => 4
            ],
            [
                'name' => 'module_delete',
                'description' => 'Eliminar modulos',
                'module_id' => 4
            ],
            [
                'name' => 'income_access',
                'description' => 'Acceder al listado de ingresos',
                'module_id' => 5,
            ],
            [
                'name' => 'income_create',
                'description' => 'Crear nuevo ingeso',
                'module_id' => 5
            ],
            [
                'name' => 'income_edit',
                'description' => 'Editar ingreso',
                'module_id' => 5
            ],
            [
                'name' => 'income_view',
                'description' => 'Ver detalles del ingreso',
                'module_id' => 5
            ],
            [
                'name' => 'income_delete',
                'description' => 'Eliminar ingreso',
                'module_id' => 5
            ],
            [
                'name' => 'expense_access',
                'description' => 'Acceder al listado de gastos',
                'module_id' => 6
            ],
            [
                'name' => 'expense_create',
                'description' => 'Crear nuevo gasto',
                'module_id' => 6
            ],
            [
                'name' => 'expense_edit',
                'description' => 'Editar gasto',
                'module_id' => 6
            ],
            [
                'name' => 'expense_view',
                'description' => 'Ver detalles del gasto',
                'module_id' => 6
            ],
            [
                'name' => 'expense_delete',
                'description' => 'Eliminar gasto',
                'module_id' => 6
            ],
        ];

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
