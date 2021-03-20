<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
            [
                'name' => 'Usuarios',
            ],
            [
                'name' => 'Roles',
            ],
            [
                'name' => 'Permisos',
            ],
            [
                'name' => 'Modulos',
            ],
            [
                'name' => 'Ingresos',
            ],
            [
                'name' => 'Gastos',
            ]
        ];

        foreach ($modules as $module) {
            Module::create($module);
        }
    }
}
