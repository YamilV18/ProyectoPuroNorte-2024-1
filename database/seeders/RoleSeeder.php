<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear roles
        $roles = [
            'Administrador',
            'Gerente',
            'Mozo',
            'Cajero'
        ];

        foreach ($roles as $roleName) {
            Role::create(['name' => $roleName, 'guard_name' => 'web']);
            Role::create(['name' => $roleName, 'guard_name' => 'api']);
        }

        // Asignar permisos a los roles
        $this->assignPermissions();
    }
    private function assignPermissions()
    {
        // Permisos para roles
        $permissions = [
            'Administrador' => [
                'Ver dashboard',
                'Listar usuario', 'Crear usuario', 'Editar usuario', 'Eliminar usuario',
                'Listar Productos', 'Crear Productos', 'Editar Productos', 'Eliminar Productos',
                'Listar Mesas', 'Crear Mesas', 'Editar Mesas', 'Eliminar Mesas',
                'Listar Pedidos', 'Crear Pedidos', 'Editar Pedidos', 'Eliminar Pedidos',
                'Listar Cobranza', 'Crear Cobranza', 'Editar Cobranza', 'Eliminar Cobranza'
            ],
            'Gerente' => [
                'Ver dashboard',
                'Listar usuario', 'Crear usuario', 'Editar usuario',
                'Listar Productos', 'Crear Productos', 'Editar Productos',
                'Listar Mesas', 'Crear Mesas', 'Editar Mesas',
                'Listar Pedidos', 'Crear Pedidos', 'Editar Pedidos',
                'Listar Cobranza', 'Crear Cobranza', 'Editar Cobranza'
            ],
            'Mozo' => [
                'Ver dashboard',
                'Listar Productos', 'Listar Mesas',
                'Listar Pedidos', 'Crear Pedidos', 'Editar Pedidos', 'Eliminar Pedidos'
            ],
            'Cajero' => [
                'Ver dashboard',
                'Listar Productos', 'Listar Mesas',
                'Listar Pedidos', 'Crear Pedidos', 'Editar Pedidos', 'Eliminar Pedidos',
                'Listar Cobranza', 'Crear Cobranza', 'Editar Cobranza', 'Eliminar Cobranza'
            ]
        ];

        foreach ($permissions as $roleName => $perms) {
            $roleWeb = Role::findByName($roleName, 'web');
            $roleApi = Role::findByName($roleName, 'api');

            // Asignar permisos al guard web
            foreach ($perms as $perm) {
                $permission = Permission::where('name', $perm)->where('guard_name', 'web')->first();
                if ($permission) {
                    $roleWeb->givePermissionTo($permission);
                }
            }

            // Asignar permisos al guard api
            foreach ($perms as $perm) {
                $permission = Permission::where('name', $perm)->where('guard_name', 'api')->first();
                if ($permission) {
                    $roleApi->givePermissionTo($permission);
                }
            }
        }
    }
}
