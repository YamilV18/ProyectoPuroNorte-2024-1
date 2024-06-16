<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Staff::create([
            'nombre'=>'admin',
            'contraseña'=>'123456',
            'rol'=>'1'
        ]);
        Staff::create([
            'nombre'=>'gerente',
            'contraseña'=>'123456',
            'rol'=>'2'
        ]);
        Staff::create([
            'nombre'=>'cajero',
            'contraseña'=>'123456',
            'rol'=>'3'
        ]);
        Staff::create([
            'nombre'=>'mozo',
            'contraseña'=>'123456',
            'rol'=>'4'
        ]);
    }
}
