<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user=User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('12345678')
        ]);
        $role = Role::findByName('Administrador');
        $user->assignRole($role);

        $user=User::create([
            'name'=>'gerente',
            'email'=>'gerente@gmail.com',
            'password'=>bcrypt('12345678')
        ]);
        $role = Role::findByName('Gerente');
        $user->assignRole($role);

        $user=User::create([
            'name'=>'cajero',
            'email'=>'cajero@gmail.com',
            'password'=>bcrypt('12345678')
        ]);
        $role = Role::findByName('Cajero');
        $user->assignRole($role);

        $user=User::create([
            'name'=>'mozo',
            'email'=>'mozo@gmail.com',
            'password'=>bcrypt('12345678')
        ]);
        $role = Role::findByName('Mozo');
        $user->assignRole($role);
    }
}
