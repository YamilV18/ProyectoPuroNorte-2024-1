<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create([
            'name' => 'Ver dashboard',
            'guard_name' => 'web'
        ]);

        // Permisos para web y api
        $permissions = [
            'Listar usuario',
            'Crear usuario',
            'Editar usuario',
            'Eliminar usuario',

            'Listar Productos',
            'Crear Productos',
            'Editar Productos',
            'Eliminar Productos',

            'Listar Mesas',
            'Crear Mesas',
            'Editar Mesas',
            'Eliminar Mesas',

            'Listar Pedidos',
            'Crear Pedidos',
            'Editar Pedidos',
            'Eliminar Pedidos',

            'Listar Cobranza',
            'Crear Cobranza',
            'Editar Cobranza',
            'Eliminar Cobranza'
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission,
                'guard_name' => 'web'
            ]);
            Permission::create([
                'name' => $permission,
                'guard_name' => 'api'
            ]);
        }
    }
}
